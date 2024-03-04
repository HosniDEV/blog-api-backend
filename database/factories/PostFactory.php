<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title=$this->faker->name();
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'content'=>$this->faker->paragraph(),
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'published'=>$this->faker->randomElement((['1','0'])),
        ];
    }
}
