<?php

namespace App\Services;

use App\Http\Traits\StoreAvatarTrait;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdministratorService
{
    use StoreAvatarTrait;

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

    public function destroy(User $administrator): bool
    {
        return $administrator->delete();
    }

    public function update(User $administrator, array $data): User
    {
        if (isset($data['new_password']) && !is_null($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }
        if (isset($data['new_avatar'])) {
            //deleting old avatar in case user has it
            if ($administrator->avatar) {
                Storage::disk('public')->delete($administrator->avatar);
            }
            $fieldName = self::storeAvatar($data['new_avatar'], $data['name']);
            $data['avatar'] = $fieldName;
        }

        $administrator->update($data);

        return $administrator->fresh();
    }

    public function store(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $data['show_phone_number'] = 0;
        $data['show_email'] = 0;

        if (isset($data['avatar'])) {
            $fieldName = self::storeAvatar($data['avatar'], $data['name']);
            $data['avatar'] = $fieldName;
        }

        $admin = $this->model->create($data);
        $admin->assignRole(Role::ROLE_ADMIN);

        return $admin;
    }
}
