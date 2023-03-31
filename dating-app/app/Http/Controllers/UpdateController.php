<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikesUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Users $user, LikesUpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('index');
    }
}
