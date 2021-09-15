<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authorization\LoginRequest;
use App\Http\Requests\Authorization\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function login(LoginRequest $request)
    {

    }


    public function register(RegisterRequest $request)
    {

    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return back();
    }
}
