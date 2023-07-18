<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserWithUser;
use Illuminate\Database\Eloquent\Collection;

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
        $userPreferences = auth()->user()->user_preferences;
        $idsOfUsersWithSympathy = $this->takeIdOfUsersWithSympathy();
        $user = $this->selectUser($userPreferences,  $idsOfUsersWithSympathy);
       if (($user->id === auth()->user()->id)){
            return view('homepage', compact('user',));
        }
        $tags = $user->tags;
        return view('homepage', compact('user', 'tags'));
    }

    protected function selectUser($userPreferences,  $idsOfUsersWithSympathy)
    {
        if ($userPreferences === 'all'){
            $user = Users::where('id', '!=', auth()->user()->id)->whereNotIn('id', $idsOfUsersWithSympathy)->where(function ($query) {
                $query->where('user_preferences', 'all')
                    ->orWhere('user_preferences', auth()->user()->gender);})
                ->inRandomOrder()->first();
            if (empty($user)){
                return Users::where('id', auth()->user()->id)->first();
            }
            return $user;
        }

        $user =  Users::where('id', '!=', auth()->user()->id)->whereNotIn('id', $idsOfUsersWithSympathy)->where('gender', $userPreferences)->where(function ($query) {
            $query->where('user_preferences', 'all')
                ->orWhere('user_preferences', auth()->user()->gender);})
            ->inRandomOrder()->first();
        if (empty($user)){
            return Users::where('id', auth()->user()->id)->first();
        }
        return $user;

    }


    protected function takeIdOfUsersWithSympathy():array
    {
        $usersWithSympathyFromUser = UserWithUser::where(function ($query){
            $query->where('user_1_id', auth()->user()->id)->where('is_like_from_user_1', true);
        })->orWhere(function ($query ){
            $query->where('user_2_id', auth()->user()->id)->where('is_like_from_user_2', true);
        })->get();

        foreach ($usersWithSympathyFromUser as $userWithSympathyFromUser){
            if($userWithSympathyFromUser->user_1_id === auth()->user()->id)
            {
                $idsOfUsersWithSympathy[] = $userWithSympathyFromUser->user_2_id;
            }else{
                $idsOfUsersWithSympathy[] = $userWithSympathyFromUser->user_1_id;
            }
        }

        if (empty($idsOfUsersWithSympathy)){
            $idsOfUsersWithSympathy[] = auth()->user()->id;
        }
        return $idsOfUsersWithSympathy;
    }
}
