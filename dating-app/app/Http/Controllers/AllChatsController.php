<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserWithUser;
use Illuminate\Http\Request;

class AllChatsController extends Controller
{
    public function __invoke()
    {
        $chats = UserWithUser::where('is_like_from_user_1', true)->where('is_like_from_user_2', true)
            ->where('user_1_id', auth()->user()->id)
            ->orWhere('user_2_id', auth()->user()->id)->get();
        foreach ($chats as $chat){
            if ($chat->user_1_id !== auth()->user()->id){
                $user = Users::where('id', $chat->user_1_id)->first();
                $chat['auth_user_id'] = auth()->user()->id;
                $chat['interlocutor_id'] = $user->id;
                $chat['interlocutor_name'] = $user->name;
                $chat['interlocutor_image'] = $user->image;
            }else{
                $user = Users::where('id', $chat->user_2_id)->first();
                $chat['auth_user_id'] = auth()->user()->id;
                $chat['interlocutor_id'] = $user->id;
                $chat['interlocutor_name'] = $user->name;
                $chat['interlocutor_image'] = $user->image;
            }
        }
        return view('chats', compact('chats'));
    }
}
