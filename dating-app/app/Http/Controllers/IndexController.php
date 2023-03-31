<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikesUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $user = Users::inRandomOrder()->first();
        if ($user->name === auth()->user()->name)
        {
            return redirect()->route('index');
        }
        return view('index', compact('user'));
    }


    public function updateLikes(Users $user)
    {
        $data = $user->likes;
        $data++;
        $user->update([
            'likes'=>$data,
        ]);
        return redirect()->route('index');
    }
}
