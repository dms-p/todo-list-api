<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status=['Todo', 'Progress','Done'];
        return [
            'title'=>fake()->word(),
            'description'=>fake()->sentence(),
            'user_id'=>User::factory(),
            'status'=>$status[rand(0,2)],
            'slug'=>uniqid()
        ];
    }
}
