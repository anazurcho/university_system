<?php

namespace App\Http\Controllers;

use App\Http\Requests\user_requests\LoginRequest;
use App\Http\Requests\user_requests\RegisterRequest;
use App\Http\Requests\user_requests\PasswordRequest;
use App\Http\Requests\user_requests\UpdateUserRequest;
use App\Models\StudentShell;
use App\Models\User;
use http\Client\Request;
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
    public function my_profile()
    {
        return view('user.my_profile');
    }
    public function open(User $user)
    {
        return view('user.user', compact('user'));
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('user/index', compact('users'));
    }
    public function my_students()
    {
        $this->authorize('lecturer');
        $lectures = Auth::user()->lecturer()->get()->pluck('id')->toArray();
        $student_shells = StudentShell::whereIn('lecture_id', $lectures)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $student_shells)->paginate(10);
        return view('user/index', compact('users'));
    }
    public function edit(User $user)
    {
        return view("user/edit", compact('user'));
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('all_users');
    }
    public function update(UpdateUserRequest $request, User $user)
    {
//        $user->update($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->status){
            $user->status = $request->status;
        }else{
            $user->status = $user->status;
        }

        $user->save();
        return redirect()->route('my_profile');
    }
    public function password_edit(User $user)
    {
        return view("user/change_password", compact('user'));
    }
    public function password_update(PasswordRequest $request, User $user)
    {
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('my_profile');
    }
    public function user_create()
    {
        return view('user.create');
    }
    public function user_save(RegisterRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('all_users');
    }
}
