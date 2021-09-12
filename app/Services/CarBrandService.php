<?php

namespace App\Services;

use App\Models\CarBrand;

class CarBrandService
{
    public function __construct(protected CarBrand $model) {}

    public function getAll()
    {
        return $this->model->all();
    }
}
