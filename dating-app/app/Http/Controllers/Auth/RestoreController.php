<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\TagUser;
use App\Models\Users;
use App\Models\UsersTags;
use App\Models\UserWithUser;

class RestoreController extends Controller
{
    public function restoreAccount()
    {
        Users::where('email', $_POST['email'])->restore();
        return view('auth.login');
    }
    public function forceDeleteAccount()
    {
        $user = Users::where('email', $_POST['email'])->onlyTrashed()->first();
        Message::where('user_1_id', $user->id)->orWhere('user_2_id', $user->id)->forceDelete();
        UserWithUser::where('user_1_id', $user->id)->orWhere('user_2_id', $user->id)->forceDelete();
        UsersTags::where('user_id', $user->id)->forceDelete();
        $user->forceDelete();
        return redirect()->route('register');
    }
}
