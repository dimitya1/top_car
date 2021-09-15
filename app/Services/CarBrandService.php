<?php

namespace App\Services;

use App\Models\CarBrand;
use Illuminate\Support\Collection;

class CarBrandService
{
    public function __construct(protected CarBrand $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function save(array $data): CarBrand
    {
        return $this->model->create($data);
    }
}
