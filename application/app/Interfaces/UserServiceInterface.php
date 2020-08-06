<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function signUp(Request $request);

    public function saveAccount(Request $request);

    public function getUserById($user_id);

    public function getAuthId();

    public function getAuthUser();

    public function logOut();

    public function allUsers();
}
