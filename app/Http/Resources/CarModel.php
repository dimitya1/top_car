<?php

namespace App\Http\Resources;

use App\Models\Rating;
use App\Services\RatingService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModel extends JsonResource
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
        return [
            'name'           => $this->name,
            'car_brand_name' => $this->carBrand->name,
            'produced_from'  => $this->produced_from,
            'produced_to'    => $this->produced_to,
            'gallery'        => $this->gallery,
            'reviews_count'  => $this->reviews->count(),
        ];
    }
}
