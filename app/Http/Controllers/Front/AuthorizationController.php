<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Authorization\LoginRequest;
use App\Http\Requests\Front\Authorization\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $remember = false;
        if (isset($request->remember_me) && $request->remember_me === 'on') {
            $remember = true;
        }

        if (auth()->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $remember)) {
            return redirect()
                ->route('home')
                ->with('successful_registration', __('app.authorization.successful_login'));
        }

        return back()->withErrors(
            ['email' => __('auth.failed')]
        );
    }


    public function register(RegisterRequest $request, UserService $userService): RedirectResponse
    {
        $remember = false;
        if (isset($request->remember_me) && $request->remember_me === 'on') {
            $remember = true;
        }

        $user = $userService->save($request->all());
        $user->assignRole(Role::ROLE_USER);

        auth()->login($user, $remember);

        return redirect()->route('home')->with('successful_login', __('app.authorization.successful_registration'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return back()->with('successful_logout', __('app.authorization.successful_logout'));
    }
}
