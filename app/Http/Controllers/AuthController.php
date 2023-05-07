<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view("auth.login");
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = User::where("email", $credentials["email"])->first();
            session()->regenerate();
            return redirect()->intended(route('blog.index'))->with("success", "Bienvenue $user->name");
        }

        return to_route('auth.login')->withErrors([
            "email" => "Email ou mot de passe invalide"
        ])->onlyInput("email");
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }
}