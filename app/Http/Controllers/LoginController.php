<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);

    }
    public function authenticate(Request $request){ 

            $credentials = $request->validate([

                'email'=> 'required|email:dns',
                'password' => 'required'
            ]);

            if(Auth::attempt($credentials)){

                $request->session()->regenerate();
                // untuk keamanan
                return redirect()->intended('/dashboard');
            }
            // catatan untuk link itu kebanyakn by slug contoh diatas ini file nya adalah index tapi ditulis by slug
            // jadi link yg harus ada di web itu adalah sesuai yaitu dashboard

            return back()->with('loginError', 'LoginFailed');


    }

    public function logout(){

        Auth::logout();

        request()->session()->invalidate();
        // supaya gabisa dipake

        request()->session()->regenerateToken();
        // supaya gadibajak
        return redirect('/');

    }
}

// public function logout(Request $request){

//     Auth::logout();

//     $request->session()->invalidate();
//     // supaya gabisa dipake

//     $request->session()->regenerateToken();
//     // supaya gadibajak
//     return redirect('/');

// } ini sama aja penulisan beda