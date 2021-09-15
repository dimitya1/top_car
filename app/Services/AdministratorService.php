<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class AdministratorService
{
    public function __construct(protected User $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
