<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AdministratorService
{
    public function __construct(protected User $model) {}

    public function getAll(): Collection
    {
        return $this->model->newQuery()->latest()->get()->filter(function (User $user) {
            return $user->hasRole(Role::ROLE_ADMIN);
        });
    }

    public function getAllWithoutCurrent(): Collection
    {
        return self::getAll()->filter(function (User $user) {
            return $user->id !== auth()->id();
        });
    }

    public function destroy(User $administrator): ?bool
    {
        return $administrator->delete();
    }

    public function update(User $administrator, array $data): User
    {
        if (isset($data['new_password']) && !is_null($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }
        $administrator->update($data);

        return $administrator->fresh();
    }

    public function store(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $data['show_phone_number'] = 0;
        $data['show_email'] = 0;

        $admin = $this->model->create($data);
        $admin->assignRole(Role::ROLE_ADMIN);

        return $admin;
    }
}
