<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(protected User $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
