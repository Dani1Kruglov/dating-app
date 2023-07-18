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
        $nextUser = $this->selectUser($userPreferences, $idsOfUsersWithSympathy);
        if (($nextUser->id === auth()->user()->id)){
            $description = 'Нет пользователей';
            return response()->json(['description' => $description]);
        }
        $tags = $nextUser->tags;
        return response()->json(['user' => $nextUser, 'tags' => $tags]);
    }
}
