<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showRegister()
    {
        return view('register');
    }

    function storeUser()
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    function showLogin()
    {
        return view('login');
    }

    function login()
    {
        $email = request('email');
        $password = request('password');
        $user = Auth::attempt(request()->only('email', 'password'));
        if ($user) {
            return redirect('/');
        }
        return redirect('/login');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
