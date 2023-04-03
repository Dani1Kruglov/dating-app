<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Users $user)
    {
        $user -> delete();
        return redirect()->route('log.register');
    }
}
