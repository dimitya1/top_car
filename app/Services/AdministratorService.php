<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;

class AdministratorService
{
    public function __construct(protected User $model) {}

    public function getAll(): Collection
    {
        return $this->model->all()->filter(function (User $user) {
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
        $administrator->update($data);

        return $administrator->fresh();
    }

    public function store(array $data): User
    {
        $admin = $this->model->create($data);
        $admin->assignRole(Role::ROLE_ADMIN);

        return $admin;
    }
}
