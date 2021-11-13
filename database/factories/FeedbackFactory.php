<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $creatorIsAuthorized = rand(0, 1);
        $creator = null;
        if ($creatorIsAuthorized) {
            $creator = User::all()->random();
        }
        $isHandled = rand(0, 1);

        return [
            'creator_id' => $creator?->id,
            'handled_by' => $isHandled
                ? User::query()->get()->filter(function (User $user) {
                    return $user->hasRole(Role::ROLE_ADMIN);
                })->first()?->id
                : null,
            'message' => $this->faker->realText(rand(10, 60)),
            'creator_name' => $creator instanceof User
                ? $creator->name
                : $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'creator_email' => $creator instanceof User
                ? $creator->email
                : $this->faker->email(),
            'creator_phone_number' => $creator instanceof User
                ? $creator->phone_number
                : $this->faker->e164PhoneNumber(),
            'is_handled' => $isHandled,
            'comment'    => $isHandled ? $this->faker->realText(rand(10, 30)) : null,
        ];
    }
}
