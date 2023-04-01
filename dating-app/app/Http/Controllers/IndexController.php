<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $user = Users::inRandomOrder()->first();
        if ($user->id === auth()->user()->id)
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
        return redirect()->route('home');
    }
    public function updateDislikes(Users $user)
    {
        $data = $user->dislikes;
        $data++;
        $user->update([
            'dislikes'=>$data,
        ]);
        return redirect()->route('home');
    }
}
