<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Message;
use App\Models\Users;
use App\Models\UserWithUser;
use Illuminate\Http\Request;

class UpdateDislikesOrLikesController extends HomeController
{

    public function updateLikes(Users $user, Request $request)
    {
        $data = $user->likes;
        $data++;
        $user_preferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $user_preferences]);
        $user->update([
            'likes'=>$data,
        ]);
        if  (UserWithUser::where('user_1_id', $user->id)->where('user_2_id', auth()->user()->id)->where('is_like_from_user_1', true)->exists()) {
            UserWithUser::where([
                'user_1_id'=>$user->id,
                'user_2_id'=> auth()->user()->id,
                'is_like_from_user_1'=> true,
            ])->update(['is_like_from_user_2' => true]);

            $message = 'Вы понравились друг другу,начинайте общаться!';
            Message::create([
                'user_1_id'=>auth()->user()->id,
                'user_2_id'=>$user->id,
                'body'=>encrypt($message)
            ]);
        }else{
            UserWithUser::create([
                'user_1_id'=>auth()->user()->id,
                'user_2_id'=>$user->id,
                'is_like_from_user_1'=>true,
                'is_like_from_user_2'=>false,
            ]);
        }

        $user = $this->selectUser($user_preferences);
        $tags = $user->tags;

        return response()->json(['user' => $user, 'tags' => $tags]);
    }
    public function updateDislikes(Users $user, Request $request)
    {

        $data = $user->dislikes;
        $data++;
        $user_preferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $user_preferences]);
        $user->update([
            'dislikes'=>$data,
        ]);


        $user = $this->selectUser($user_preferences);
        $tags = $user->tags;


        return response()->json(['user' => $user, 'tags' => $tags]);
    }
}
