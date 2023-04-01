<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Users $user, MyPageUpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('my.page', auth()->user());
    }
}
