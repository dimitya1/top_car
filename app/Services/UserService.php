<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

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
}
