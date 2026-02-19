<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate(['password' => 'required']);

        if ($request->password === config('admin.password')) {
            session(['admin_logged' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'Mot de passe incorrect.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged');
        return redirect()->route('admin.login');
    }
}
