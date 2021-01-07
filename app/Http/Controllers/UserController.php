<?php

namespace App\Http\Controllers;

use App\Http\Requests\user_requests\LoginRequest;
use App\Http\Requests\user_requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('user.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->except(('_token'));
        if (Auth::attempt($credentials)) {
            return redirect()->route('my_profile');
        } else {
            abort(403);
        }
    }
    public function register()
    {
        return view('user.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = new User($request->all());
        $user->status = 'student';
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return view('user.login');
//        return $this->postLogin($request);
    }
}
