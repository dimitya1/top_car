<?php

namespace App\Services;

use App\Models\CarModel;

class CarModelService
{
    public function __construct(protected CarModel $model) {}

    public function getAll()
    {
        return $this->model->all();
    }
}
