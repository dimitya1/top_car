<?php

namespace App\Http\Livewire;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class CarBrandsModelsSelect extends Component
{
    public Collection $brands;
    public Collection $models;
    public $brand;
    public $model;

    public function mount()
    {
        $this->brands = CarBrand::all();
        $this->models = CarModel::all();
    }

    public function render(): View
    {
        return view('livewire.car-brands-models-select');
    }

    public function updatedBrand($brandId)
    {
        $this->models = CarModel::where('car_brand_id', $brandId)->get();
    }

    public function updatedModel($modelId)
    {
        $this->brand = CarBrand::whereHas('carModels', function (Builder $query) use ($modelId) {
            return $query->where('id', $modelId);
        })->first()->id;
    }
}
