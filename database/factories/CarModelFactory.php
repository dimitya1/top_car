<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $gallery = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $gallery[] = $this->faker->imageUrl(1920, 1080, 'transport');
        }
        $producedYearPresent = rand(0, 1);
        return [
            'car_brand_id' => CarBrand::all()->random()->id,
            'name' => $this->faker->unique()->word(),
            'produced_from' => $producedYearPresent ? rand(1980, 2005) : null,
            'produced_to' => $producedYearPresent ? rand(2005, now()->year) : null,
            'gallery' => json_encode($gallery),
        ];
    }
}
