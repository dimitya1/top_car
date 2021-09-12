<?php

namespace App\Services;

use App\Models\User;

class AdministratorService
{
    public function __construct(protected User $model) {}

    public function getAll()
    {
        return $this->model->all();
    }
}
