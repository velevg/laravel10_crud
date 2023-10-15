<?php

namespace App\Http\Controllers;

use App\Models\User; //za user
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //za hash

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name; //name from input fields
        $user->email = $request->email;
        $user->password = Hash::make($request->password); //hashirame s fun hash ot facades gore

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Login successfull');
        }

        return back()->with('error', 'Email or passowrd incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
