<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $faker->title;
            'slug' => $faker->slug,
            'body' => $faker->text,
            'user_id' => factory(App\Models\User::class),
            'status' => 0,
            'reads' => 0,
            'meta_id' => $faker->randomDigit(),
            'category_id' => $faker->randomDigit(),
        ];
    }
}
