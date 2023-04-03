<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class CheckController extends Controller
{


    public function __invoke(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.check_email');
        }
        if ($request->isMethod('post')) {
            if (Users::where('email', $_POST['verified_email'])->onlyTrashed()->first())
            {
                $email = $_POST['verified_email'];
                $message = "Удаленный аккаунт с почтой '{$email}'' найден. Вы можете создать новый аккаунт или восстановить прежний
                    аккаунт с этой почтой.";
                return view('auth.successful_check_email', compact('message', 'email'));
            }
            if (Users::where('email', $_POST['verified_email'])->withTrashed()->first())
            {
                $email = $_POST['verified_email'];
                $message = "У вас уже есть активный аккаунт с почтой '{$email}'. Войдите в него.";
                return view('auth.account_valid', compact('message', 'email'));
            }
            return view('auth.check_email');

        }
    }

}
