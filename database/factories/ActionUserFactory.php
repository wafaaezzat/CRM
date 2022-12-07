<?php

namespace Database\Factories;

use App\Models\Action;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\actionUser>
 */
class ActionUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $actions = Action::pluck('id')->toArray();

        return [
            'user_id' =>$this->faker->randomElement($users),
            'action_id' =>$this->faker->randomElement($actions),

        ];
    }
}
