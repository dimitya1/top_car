<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function __construct(protected User $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function save(array $data): User
    {
        if (isset($data['show_email']) && $data['show_email'] === 'on') {
            $data['show_email'] = true;
        }
        if (isset($data['show_phone_number']) && $data['show_phone_number'] === 'on') {
            $data['show_phone_number'] = true;
        }

        $data['password'] = Hash::make($data['password']);

        return $this->model->create($data);
    }

    public function update(User $user, array $data): User
    {
        if (isset($data['new_password']) && !is_null($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }

        $user->update($data);

        return $user->fresh();
    }

    public function getAllForAdminTable(): LengthAwarePaginator
    {
        return $this->model->newQuery()->get()->filter(function (User $user) {
            return $user->hasRole(Role::ROLE_USER);
        })->toQuery()->latest()->paginate(config('topcar.users.paginator', 25));
    }

    public function clearSessionsAndTokens(User $user): void
    {
        //clearing sessions powered by MySQL table
        DB::table('sessions')->where('user_id', $user->id)->delete();

        //clearing API auth tokens
        $user->tokens()->delete();
    }

    public function destroy(User $administrator): bool
    {
        return $administrator->delete();
    }
}
