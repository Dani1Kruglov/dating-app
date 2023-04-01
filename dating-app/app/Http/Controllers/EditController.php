<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        return view('mypage_edit', compact('user'));
    }

}
