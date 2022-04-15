<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index',[
            'title' => 'Register',
            'active' => 'register'
        ]);
        
    }
    public function store(Request $request){
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // harus diisi maximal 255 karakter
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            // sama aja fungsinya
            'email' => 'required|email:dns|unique:users',
            // biar unik dan ga sama dengan email lain yg ada di tabel users
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']); biar password random di db nya atau bisa pake cara dibawah

        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Succesful Please Login');
        // biar ada bacaan sukses nyambung ke index login
        // atau bisa
        return redirect('/login')->with('success', 'Registration Succesfull! Please Login');
        // kalo beres masuk hal login
    }
}
