<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = Login::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            // Update last login details on the user model
            $user->update([
                'last_login_at' => now(),
                'ip_address' => $request->ip()
            ]);

            // Record login history
            LoginHistory::create([
                'user_id' => $user->id,
                'login_at' => now(),
                'ip_address' => $request->ip()
            ]);
            
            session(['login_id' => $user->id]);
            
            // Redirect based on role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
        
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:logins,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        Login::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }

    public function showForgot()
    {
        return view('forgot');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:logins,email',
        ]);
        
        $user = Login::where('email', $request->email)->first();
        $user->password = Hash::make('password123');
        $user->save();
        
        return redirect()->route('login')->with('success', 'Password direset ke: password123');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login_id');
        return redirect()->route('login');
    }
} 