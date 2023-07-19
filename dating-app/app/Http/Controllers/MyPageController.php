<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $total = $user->likes+$user->dislikes;
        if ($user->likes === 0) {$rating = 0;}
        else {$rating = round((10*$user->likes)/$total, 1);}


        if (isset(auth()->user()->email_verified_at)) {$verification = 'Пройдена';}
        else{$verification ='Не пройдена';}
        $tags = $user->tags;

        return view('mypage', compact('user', 'rating', 'verification', 'tags'));

    }
}
