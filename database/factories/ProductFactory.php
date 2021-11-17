<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => Str::slug($this->faker->sentence(3)),
            'summary' => $this->faker->paragraph(2),
            'description' => $this->faker->text(300),
            'photo' =>$this->faker->imageUrl(640, 480, 'animals', true),
            'stock'=> "10",
            'price' => $this->faker->randomNumber(3,true),
            'size' => $this->faker->bothify('?????-#####'),
            'cat_id' => "1",
        ];
    }
}
