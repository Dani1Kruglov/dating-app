<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersFilterController extends HomeController
{
    public function __invoke(Request $request)
    {
        $user_preferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $user_preferences]);
        $user = $this->selectUser($user_preferences);
        $tags = $user->tags;
        return response()->json(['user' => $user, 'tags' => $tags]);
    }
}
