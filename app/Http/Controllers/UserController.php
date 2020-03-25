<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }
    public function create()
    {
        return view('users.create');
    }

    public function edit(User $user)
    {
        $profile = $user->profile;
        return view('users.profile',['user'=> $user,'profile'=>$profile]);
    }

    public function update(User $user,Request $req)
    {
        $profile = $user->profile;
        $data  = $req->all();
        if($req->hasFile('picture')){
            $picture = $req->picture->store('picture_profile','public');
            $data['picture'] = $picture;
        }
        $profile->update($data);
        return redirect(route('home'));

    }
}
