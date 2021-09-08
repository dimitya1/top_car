<?php

namespace Database\Factories;

use App\Models\CarBrand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarBrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarBrand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'logo' => $this->faker->imageUrl(320, 320, 'abstract'),
        ];
    }
}
