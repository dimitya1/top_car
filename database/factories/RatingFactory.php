<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'review_id' => Review::all()->random()->id,
            'value' => $this->faker->randomElement(Rating::$values),
        ];
    }
}
