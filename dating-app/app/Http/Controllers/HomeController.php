<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (isset($_POST['userFilter']))
        {
            //доработать фильтрацию по выборке гендера который нужен (также в homepage.blade.php)
            if ($_POST['userFilter'] === 'male')
            {
                dump($_POST['userFilter']);
                $user = Users::where('gender', 'male')->inRandomOrder()->first();
            }
            if ($_POST['userFilter'] === 'female')
            {
                dump($_POST['userFilter']);
                $user = Users::where('gender', 'female')->inRandomOrder()->first();
            }
            if ($_POST['userFilter'] === 'All')
            {
                dump($_POST['userFilter']);
                $user = Users::inRandomOrder()->first();
            }
        }
        else
        {
            if (auth()->user()->gender === 'male') {$user = Users::where('gender', 'female')->inRandomOrder()->first();}
            elseif(auth()->user()->gender === 'female'){$user = Users::where('gender', 'male')->inRandomOrder()->first();}
        }


        if ($user->id === auth()->user()->id) {return redirect()->route('home');}



        return view('homepage', compact('user'));
    }
}
