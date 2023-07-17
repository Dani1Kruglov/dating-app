<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersFilterController extends HomeController
{
    public function __invoke(Request $request)
    {
        $userPreferences = $request->input('user_preferences');
        Users::where('id', auth()->user()->id)->update(['user_preferences'=> $userPreferences]);
        $idsOfUsersWithSympathy = $this->takeIdOfUsersWithSympathy();
        $user = $this->selectUser($userPreferences, $idsOfUsersWithSympathy);
        $tags = $user->tags;
        return response()->json(['user' => $user, 'tags' => $tags]);
    }
}
