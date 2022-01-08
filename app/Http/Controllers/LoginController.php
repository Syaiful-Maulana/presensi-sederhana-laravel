<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.login');
    }
    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }
        return redirect('/login')->with('status', 'Email atau Password Salah');;
    }
    public function register()
    {
        return view('Login.register');
    }
    public function simpanRegistrasi(Request $request){
        // dd($request->all());
    $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required'
    ],
    [
        'name.required' => 'Username tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong'
    ]);
        User::create([
            'name' => $request->name,
            'level' => 'karyawan',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('login')->with('status', 'Register success');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
