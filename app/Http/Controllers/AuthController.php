<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // laat de view zien van login
    public function login() {
        return view('auth.login');
    }

    // checkt de login attempt
    public function authenticate(Request $request) {

        $attempt = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($attempt) {
            return redirect()->to('dashboard');
        }

        return back()->with('message', 'Invalid email or password');

    }

    // handelt het uitloggen af
    public function logout() {
        Auth::logout();
        return redirect()->to('/');
    }

    // laat de view zien van register
    public function register() {

    }
}
