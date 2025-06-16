<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login
    public function index()
    {
        if (Session::has('loginId')) {
            return redirect()->route('std.myView');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginAuth = User::where('email', '=', $request->email)
            ->first();

        if ($loginAuth) {
            Session::put('loginId', $loginAuth->id);
            return redirect()->route('std.myView')->with('success', 'Login successfully');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    // Register
    public function indexRegister()
    {
        if (Session::has('loginId')) {
            return redirect()->route('std.myView');
        }
        return view('auth.register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect()->route('auth.index')->with('success', 'Registration successful, please login');
    }

    // Logout
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('auth.index')->with('success', 'Logout successfully');
        } else {
            return redirect()->route('auth.index')->with('error', 'You are not logged in');
        }
    }
}