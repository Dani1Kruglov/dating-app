<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UpdateAuthUserController extends Controller
{
    public function __invoke(Users $user, MyPageUpdateRequest $request)
    {

        $data = $request->validated();
        if (isset($data['imageDelete']))
        {
            $path = 'uploads/anonym.jpg';
        }
        elseif ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }
        else{
            $oldUserPhoto = Users::select('image')->where('id', auth()->user()->id)->first();
            $path = $oldUserPhoto->image;
        }
        unset($data['imageDelete']);
        if (!empty($data['tags'])){
            $tags = $data['tags'];
            unset($data['tags']);
            $user->update($data);
            $user->tags()->detach();
            $user->tags()->attach($tags);
            Users::where('id', auth()->user()->id)->update([
                'image' => $path,
            ]);
        }else{
            $user->update($data);
            Users::where('id', auth()->user()->id)->update([
                'image' => $path,
            ]);
        }

        return redirect()->route('my.page');
    }
}
