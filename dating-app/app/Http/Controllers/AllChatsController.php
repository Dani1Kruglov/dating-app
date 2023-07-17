<?php

namespace App\Http\Controllers;

use App\Models\UserWithUser;
use Illuminate\Http\Request;

class AllChatsController extends Controller
{
    public function __invoke()
    {
        $chats = UserWithUser::where('is_like_from_user_1', true)->where('is_like_from_user_2', true)->where('user_1_id', auth()->user()->id)->orWhere('user_2_id', auth()->user()->id)->get();
        return view('chats', compact('chats'));
    }
}
