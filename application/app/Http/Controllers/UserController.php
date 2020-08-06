<?php

namespace App\Http\Controllers;

use App\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Predis\Client;
use Predis;
class UserController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function homePage()
    {
        return view('home');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);;
       // print_r($log);
          $client = new Predis\Client('tcp://172.19.0.1:6379');

        $user = $this->userService->signUp($request);
        //$client->set('querylog',$request);
        $client->setex('querylog',100,$request);
        return redirect()->route('dashboard', ['user_id' => $user]);
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = $this->userService->getAuthId();
            return redirect()->route('dashboard', ['user_id' => $user]);
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        $this->userService->logOut();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:120'
        ]);
        $this->userService->saveAccount($request);
        return redirect()->route('account');
    }

    public function getAllUsers($user_id)
    {
        $user = $this->userService->allUsers();
        $user_id = $this->userService->getUserById($user_id);
        return view('listUsers', ['users' => $user, 'user_id' => $user_id]);
    }
}
