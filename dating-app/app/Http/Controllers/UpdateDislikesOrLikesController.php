<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Message;
use App\Models\Users;
use App\Models\UserWithUser;
use Illuminate\Http\Request;

class UpdateDislikesOrLikesController extends Controller
{

    public function updateLikes(Users $user)
    {
        $data = $user->likes;
        $data++;
        $user->update([
            'likes'=>$data,
        ]);
        if (UserWithUser::where('user_1_id', auth()->user()->id)
            ->where('user_2_id', $user->id)
            ->where('is_like_from_user_1', true)
            ->exists()) {
        }
        elseif  (UserWithUser::where('user_1_id', $user->id)->where('user_2_id', auth()->user()->id)->where('is_like_from_user_1', true)->exists()) {
            UserWithUser::where([
                'user_1_id'=>$user->id,
                'user_2_id'=> auth()->user()->id,
                'is_like_from_user_1'=> true,
            ])->update(['is_like_from_user_2' => true]);
            Message::create([
                'user_1_id'=>auth()->user()->id,
                'user_2_id'=>$user->id,
                'body'=>'Вы понравились друг другу,начинайте общаться!'
            ]);
        }else{
            UserWithUser::create([
                'user_1_id'=>auth()->user()->id,
                'user_2_id'=>$user->id,
                'is_like_from_user_1'=>true,
                'is_like_from_user_2'=>false,
            ]);
        }
        return redirect()->route('home');
    }
    public function updateDislikes(Users $user)
    {
        $data = $user->dislikes;
        $data++;
        $user->update([
            'dislikes'=>$data,
        ]);
        return redirect()->route('home');
    }
}
