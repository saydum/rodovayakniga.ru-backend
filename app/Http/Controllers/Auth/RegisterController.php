<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function show() : View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) : RedirectResponse
    {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect()->route('home')->with('success', 'Account successfully registered.');
    }
}
