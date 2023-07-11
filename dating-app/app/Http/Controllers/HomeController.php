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

        $user = $this->selectUser();
        $tags = $user->tags;


       // if ((UserWithUser::where('user_1_id', $user->id)->where('user_2_id', auth()->user()->id)->exists()) || (UserWithUser::where('user_1_id', auth()->user()->id)->where('user_2_id', $user->id)->exists())){ чтобы не показывались пользователи, с которыми уже проихошла взаимная симпатия
        //Доработать ^





        return view('homepage', compact('user', 'tags'));
    }

    public function selectUser(): Users
    {
        if (auth()->user()->gender === 'male') {$user = Users::where('id', '!=', auth()->user()->id)->where('gender', 'female')->inRandomOrder()->first();}
        elseif(auth()->user()->gender === 'female'){$user = Users::where('id', '!=', auth()->user()->id)->where('gender', 'male')->inRandomOrder()->first();}
        return $user;
    }
}
