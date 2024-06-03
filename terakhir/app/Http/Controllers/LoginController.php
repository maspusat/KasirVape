<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $ini_data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($ini_data)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Login Gagal');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function register(){
        return view ('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $ini_data['name']       = $request->name;
        $ini_data['email']      = $request->email;
        $ini_data['password']   = Hash::make($request->password);

        User::create($ini_data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Login Gagal');
        }
    }
}
