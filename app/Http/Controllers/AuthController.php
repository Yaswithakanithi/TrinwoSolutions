<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    // Show the Admin Registration Form
    public function showAdminRegisterForm()
    {
        return view('auth.admin_register');
    }

    // Register a New Admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Admin registered successfully.');
    }

    // Show the Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) { 
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // Handle Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
