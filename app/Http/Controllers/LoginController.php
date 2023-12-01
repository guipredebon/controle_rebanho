<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function showLoginForm() {
        return view('layouts.login');
    }

    public function login(Request $request) {
        $credenciais = $request->only('email', 'password');


        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended('/agenda');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
