<?php

namespace Database\Factories;

use App\Models\Action;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\actionResult>
 */
class ActionResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $actions = Action::pluck('id')->toArray();

        return [
            'name' => $this->faker->paragraph(),
            'action_id' =>$this->faker->randomElement($actions),

        ];
    }
}
