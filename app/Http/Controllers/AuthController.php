<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        } else{
            return redirect('/login')->with('error', 'Email atau Password tidak sesuai');
        }
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        {
            try {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ];
        
                User::create($data);
        
                return redirect()->route('register')->with('success', 'Account created successfully.');
        
            } catch (\Exception $e) {
        
                return redirect()->route('register')->with('error', 'Gagal create account. Account sudah ada.');
        
            }
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
