<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

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
        if (auth()->user()->gender === 'Мужчина')
        {
            $user = Users::where('gender', 'Женщина')->inRandomOrder()->first();
        }
        elseif(auth()->user()->gender === 'Женщина'){
            $user = Users::where('gender', 'Мужчина')->inRandomOrder()->first();
        }
        if ($user->id === auth()->user()->id)
        {
            return redirect()->route('home');
        }
        return view('index', compact('user'));
    }
}
