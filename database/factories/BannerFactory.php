<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'link' => "category/1",
        ];
    }
}
