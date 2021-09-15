<?php

namespace App\Services;

use App\Models\CarModel;
use Illuminate\Support\Collection;

class CarModelService
{
    public function __construct(protected CarModel $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }


    public function save(array $data): CarModel
    {
        return $this->model->create($data);
    }
}
