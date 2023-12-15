<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement($array = ['Active', 'Resolved']);
        $comment = ($status == 'Resolved') ? $this->faker->text() : '';

        return [
            'status' => $status,
            'message' => $this->faker->text(),
            'comment' => $comment,
        ];
    }
}
