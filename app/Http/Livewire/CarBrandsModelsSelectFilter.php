<?php

namespace App\Http\Livewire;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class CarBrandsModelsSelectFilter extends Component
{
    public Collection $brands;
    public Collection $models;
    public $brand;
    public $model;

    public function mount()
    {
        $this->brands = CarBrand::all();
        $this->models = CarModel::all();

        if (request()->car_brand_id) {
            $this->brand = request()->car_brand_id;
            $this->models = CarModel::where('car_brand_id', request()->car_brand_id)->get();
        }
        if (request()->car_model_id) {
            $carModelId = request()->car_model_id;
            $this->model = $carModelId;
            $this->brand = CarBrand::whereHas('carModels', function (Builder $query) use ($carModelId) {
                return $query->where('id', $carModelId);
            })->first()->id;
        }
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
        if ($modelId) {
            $this->brand = CarBrand::whereHas('carModels', function (Builder $query) use ($modelId) {
                return $query->where('id', $modelId);
            })->first()->id;
        }
    }
}
