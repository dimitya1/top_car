<?php

namespace App\Http\Requests\Api\Review;

use App\Models\CarModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'car_model_name'      => ['required', 'string', 'exists:car_models,name'],
            'title'               => ['required', 'string', 'min:5', 'max:130'],
            'content'             => ['sometimes', 'string', 'min:5', 'max:15000'],
            'fuel_type'           => ['sometimes', 'string', Rule::in(CarModel::$fuelTypes)],
            'power'               => ['sometimes', 'integer', 'between:20,5000'],
            'engine'              => ['sometimes', 'string', 'max:20'],
            'consumption_city'    => ['sometimes', 'numeric', 'between:3.0,40.1'],
            'consumption_highway' => ['sometimes', 'numeric', 'between:3.0,40.1']
        ];
    }

    public function attributes(): array
    {
        return [

        ];
    }
}
