<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view ('login-site');
    }

    function login(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ],
        [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]) ;

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'author'){
                return redirect('/author');
            }
            else if(Auth::user()->role == 'registered-user'){
                return redirect('/registered_user');
            }
        } else {
            return redirect()->route('login-site')->withErrors('Username & password tidak sesuai')->withInput();
        }        
        
    }

    function showRegistrationForm()
    {
        return view('register-account');
    }

    function register(Request $request) 
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:author,registered-user',
        ], [
            'firstName.required' => 'Nama depan wajib diisi',
            'lastName.required' => 'Nama belakang wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Silakan pilih peran pengguna',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Login user secara otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard berdasarkan peran pengguna
        if (Auth::user()->role == 'author') {
            return redirect('/author');
        } else if (Auth::user()->role == 'registered-user') {
            return redirect('/registered-user');
        }
    }

}
