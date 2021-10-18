<?php

namespace App\Http\Resources;

use App\Models\Rating;
use App\Services\RatingService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $ratingService = new RatingService(new Rating());

        return [
            'car_brand_name'      => $this->carModel->carBrand->name,
            'car_model_name'      => $this->carModel->name,
            'title'               => $this->title,
            'comment'             => $this->comment,
//            'fuel_type'           => $this->fuel_type,
//            'power'               => $this->power,
//            'engine'              => $this->engine,
//            'consumption_city'    => $this->consumption_city,
//            'consumption_highway' => $this->consumption_highway,
//            'gallery'             => json_decode($this->gallery),
//            'created_at'          => $this->created_at,
//            'rating'              => $ratingService->getRating($this->resource),
        ];
    }
}
