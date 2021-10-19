<?php

namespace Database\Factories;

use App\Models\CarModel;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $galleryPresent = rand(0, 1);
        if ($galleryPresent) {
            $gallery = [];
            for ($i = 0; $i < rand(1, 5); $i++) {
                $gallery[] = $this->faker->imageUrl(1920, 1080, 'transport');
            }
        }
        return [
            'user_id' => rand(0, 1) ?: User::all()->random()->id,
            'car_model_id' => CarModel::all()->random()->id,
            'title' => $this->faker->sentence(rand(2, 6)),
            'content' => rand(0, 1) ? $this->faker->sentences(rand(1, 4), true) : null,
            'fuel_type' => rand(0, 1) ? $this->faker->randomElement(CarModel::$fuelTypes) : null,
            'power' => rand(0, 1) ? rand(80, 700) : null,
            'engine' => $this->faker->randomLetter() . $this->faker->randomNumber(1),
            'consumption_city' => rand(0, 1) ? (float)rand(50, 300) / 10 : null,
            'consumption_highway' => rand(0, 1) ? (float)rand(40, 200) / 10 : null,
            'gallery' => $galleryPresent ? json_encode($gallery) : null,
        ];
    }
}
