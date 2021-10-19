<?php

namespace App\Services;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Support\Collection;

class CarModelService
{
    public function __construct(protected CarModel $model) {}

    public function getAll(): Collection
    {
        return $this->model->newQuery()->where('paused', false)->get();
    }


    public function save(array $data): CarModel
    {
        return $this->model->create($data);
    }

    public function getItemsForSelect(CarBrand $carBrand = null): Collection
    {
        if ($carBrand) {
            return $carBrand->carModels()->pluck('name', 'id');
        } else {
            return $this->model->pluck('name', 'id');
        }
    }

    public function getByName(string $name): CarModel
    {
        return $this->model->where('name', $name)->first();
    }
}
