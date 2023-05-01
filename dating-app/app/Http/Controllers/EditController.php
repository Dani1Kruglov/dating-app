<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        $tags = Tag::all();
        return view('mypage_edit', compact('user', 'tags'));
    }

}
