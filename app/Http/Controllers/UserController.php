<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authorization\LoginRequest;
use App\Http\Requests\Authorization\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.user.userpage');
    }

    public function adminIndex(UserService $userService): View
    {
        $users = $userService->getAllForAdminTable();

        return view('pages.user.admin-index', ['users' => $users]);
    }

    public function clearAuthorisation(User $user, UserService $userService): RedirectResponse
    {
        $userService->clearSessionsAndTokens($user);

        return redirect()->route('admin.users.index')
            ->with('successful_authorisation_delete', 'Дані для авторизації успішно видалено');
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
