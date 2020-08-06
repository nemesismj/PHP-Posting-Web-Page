<?php

namespace App\Http\Controllers;

use App\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{


    public function signUp(Request $request)
    {
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        //instance of user
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        Auth::login($user);
        $user = Auth::id();
        return $user;
    }

    public function saveAccount(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        return $user;
    }

    public function getUserById($user_id)
    {
        return User::find($user_id);
    }

    public function getAuthId()
    {
        return Auth::id();
    }

    public function getAuthUser()
    {
        return Auth::user();
    }

    public function logOut()
    {
        Auth::logout();
    }

    public function allUsers()
    {
        return User::all();
    }
}
