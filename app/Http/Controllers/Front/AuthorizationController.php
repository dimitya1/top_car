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

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (\auth()->user()->hasRole(Role::ROLE_ADMIN)) {
                toast()->info('Welcome to admin panel')->push();
            }
            toast()->success(__('app.authorization.successful_login'))->push();
            
            return redirect()->route('home');
        }

        toast()->danger(__('auth.failed'))->push();
        
        return back();
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

        toast()->success(__('app.authorization.successful_registration'))->push();
        
        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
    
        toast()->success(__('app.authorization.successful_logout'))->push();
        
        return back();
    }
}
