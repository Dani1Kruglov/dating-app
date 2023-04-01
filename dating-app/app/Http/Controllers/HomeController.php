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
        $user = Users::inRandomOrder()->first();
        if ($user->id === auth()->user()->id)
        {
            return redirect()->route('home');
        }
        return view('index', compact('user'));
    }
}
