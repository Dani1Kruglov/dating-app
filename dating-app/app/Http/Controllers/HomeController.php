<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserWithUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_preferences = auth()->user()->user_preferences;
        $user = $this->selectUser($user_preferences);
        $tags = $user->tags;



       // if ((UserWithUser::where('user_1_id', $user->id)->where('user_2_id', auth()->user()->id)->exists()) || (UserWithUser::where('user_1_id', auth()->user()->id)->where('user_2_id', $user->id)->exists())){ чтобы не показывались пользователи, с которыми уже проихошла взаимная симпатия
        //Доработать ^

        return view('homepage', compact('user', 'tags'));
    }

    protected function selectUser($user_preferences): Users
    {
        switch ($user_preferences){
            case 'male':
                return Users::where('id', '!=', auth()->user()->id)->where('gender', 'male')->where(function ($query) {
                    $query->where('user_preferences', 'all')
                        ->orWhere('user_preferences', auth()->user()->gender);})
                    ->inRandomOrder()->first();
            case 'female':
                return Users::where('id', '!=', auth()->user()->id)->where('gender', 'female')->where(function ($query) {
                    $query->where('user_preferences', 'all')
                        ->orWhere('user_preferences', auth()->user()->gender);})
                    ->inRandomOrder()->first();
            default:
                return Users::where('id', '!=', auth()->user()->id)->where(function ($query) {
                    $query->where('user_preferences', 'all')
                        ->orWhere('user_preferences', auth()->user()->gender);})
                    ->inRandomOrder()->first();
        }
    }
}
