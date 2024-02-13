<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthUserAction
{
    public function handle() : Authenticatable
    {
        return Auth::user();
    }
}
