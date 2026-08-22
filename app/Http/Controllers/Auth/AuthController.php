<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    
    public function register(RegisterRequest $request) {

        $user = User::create(
            $request->validated()
        );

        Auth::login($user);

        return redirect()->route('safes.index')->with('success', 'user registered');

    }

    public function login(LoginRequest $request) {

        $result = Auth::attempt($request->validated());
        
        if($result) {

            $request->session()->regenerate();

            return redirect()->route('safes.index')->with('success', 'user logged');
        }

        return redirect()->route('auth.login.form')->with('error', 'Unable to login');

    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return  redirect()->route('welcome')->with('success', 'user logout');

    }

}
