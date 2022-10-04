<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegistrationValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }
    public function registerPost(RegistrationValidation $request)
    {
        $requests = $request->validated();
        unset($requests['photo']);
        $photo = $request->file('photo')->store('public');

        $requests['password']=Hash::make($requests['password']);
        $requests['photo']=explode('/',$photo)[1];
        User::create($requests);
        return redirect()->route('login');
    }
    public function login()
    {
        return view('users.login');

    }
    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return back()->with(['success'=>'true']);
        }
        return back()->withErrors(['auth'=>'Логин или пароль не верный!']);
    }

    public function cabinet()
    {
        return view('users.cabinet');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
    public function users()
    {
        return view('welcome');

        $users = User::select('*');
        $usersItems = $users->get();
    }
}
