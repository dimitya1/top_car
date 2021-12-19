<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Administrator\UpdateAdministratorRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Requests\Authorization\LoginRequest;
use App\Http\Requests\Authorization\RegisterRequest;
use App\Models\User;
use App\Services\AdministratorService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(UserService $userService): View
    {
        $users = $userService->getAllForAdminTable();

        return view('pages.admin.users.index', ['users' => $users]);
    }

    public function clearAuthorisation(User $user, UserService $userService): RedirectResponse
    {
        $userService->clearSessionsAndTokens($user);

        return redirect()->route('admin.users.index')
            ->with('successful_authorisation_delete', 'Дані для авторизації успішно видалено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        //todo move canAccessApi variable to controller
        
        return view('pages.admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UpdateUserRequest $request
     * @param UserService $userService
     * @return RedirectResponse
     */
    public function update(User $user,
                           UpdateUserRequest $request,
                           UserService $userService): RedirectResponse
    {
        $userService->update($user, $request->all());

        return redirect()->route('admin.users.index')->with('successful_update', 'Дані успішно оновлено');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param UserService $userService
     * @return RedirectResponse
     */
    public function destroy(User $user, UserService $userService): RedirectResponse
    {
        $userService->destroy($user);

        return redirect()->route('admin.users.index')->with('successful_destroy', 'Запис усішно видалено');
    }
}
