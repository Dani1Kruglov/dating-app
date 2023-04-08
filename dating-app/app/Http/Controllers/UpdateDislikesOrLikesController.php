<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UpdateDislikesOrLikesController extends Controller
{

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
