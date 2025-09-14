<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else if ($user->role === 'Coordinator') {
                return redirect()->route('coordinator.dashboard');
            } else if ($user->role === 'Employee') {
                return redirect()->route('employee.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid credentials')->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
