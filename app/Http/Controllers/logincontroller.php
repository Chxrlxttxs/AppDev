<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use Symfony\Component\HTTPFoundation\Response;
use App\Models\User;


class logincontroller extends Controller
{
    public function index(){
        return view('login.loginView');

    }

    public function login(Request $request){
        $checker = User::where('email', $request->email)->where('password',$request->password)->first();

        if($checkUser){
            Session::push('user',$checkUser);
            return redirect('/studentts');
        }else{
            redirect()->route('login.user')->withError('error','User not found');

        }
    }

    public function create(){
        return view('login.registerView');
    }
 
    public function register(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique;users,email',
            'password' => 'required',
            'vpassword' => 'required'
        ]);

        if($request->password == $request->vpassword){
            $save = User::insertt([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' => $request->password,
            ]);

            return($save) ? redirect()->route('login..user') : redirect()->route('cretae.user');

        }else{
            return redirect()->route('create.user')->has('message','Password not matched');
        }
        }
    }

    if(sessions::get('user')){
        return redirect('/students');
    }
    return $next($request);

