<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;

class RestoreController extends Controller
{
    public function restoreAccount()
    {
        Users::where('email', $_POST['email'])->restore();
        return view('auth.login');
    }
    public function forceDeleteAccount()
    {
        Users::where('email', $_POST['email'])->forceDelete();
        return redirect()->route('register');
    }
}
