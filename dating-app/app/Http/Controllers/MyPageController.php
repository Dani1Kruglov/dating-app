<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        if($user->dislikes === 0 ) {$medianValue = $user->likes;}

        else{$medianValue = round(($user->likes+$user->dislikes)/2);}

        if ($user->likes === 0) {$rating = 0;}

        else {$rating = round((10*$medianValue)/$user->likes, 1);}


        return view('mypage', compact('user', 'rating'));

    }
}
