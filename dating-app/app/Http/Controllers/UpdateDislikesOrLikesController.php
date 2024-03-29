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
        $userPreferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $userPreferences]);
        if ($user->id !== auth()->user()->id) {
            $data = $user->likes;
            $data++;

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
                $privateChannel =  auth()->user()->id . $user->id;
                Message::create([
                    'user_1_id'=>auth()->user()->id,
                    'user_2_id'=>$user->id,
                    'private_channel'=> encrypt((int)$privateChannel),
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
        }

        $idsOfUsersWithSympathy = $this->takeIdOfUsersWithSympathy();
        $nextUser = $this->selectUser($userPreferences, $idsOfUsersWithSympathy);
        if (($nextUser->id === auth()->user()->id)){
            $description = 'Нет пользователей';
            return response()->json(['description' => $description]);
        }
        $tags = $nextUser->tags;

        return response()->json(['user' => $nextUser, 'tags' => $tags]);
    }
    public function updateDislikes(Users $user, Request $request)
    {

        $data = $user->dislikes;
        $data++;
        $userPreferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $userPreferences]);
        $user->update([
            'dislikes'=>$data,
        ]);


        $idsOfUsersWithSympathy = $this->takeIdOfUsersWithSympathy();
        $user = $this->selectUser($userPreferences, $idsOfUsersWithSympathy);
        $tags = $user->tags;


        return response()->json(['user' => $user, 'tags' => $tags]);
    }
}
