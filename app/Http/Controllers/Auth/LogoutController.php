<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * @return Redirector
     */
    public function perform(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
