<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(500, 1000),
            'category' => array_rand(['mobile', 'pc', 'laptop']),
            'description' => $this->faker->text(200),
            'gallery' => 'https://i.gadgets360cdn.com/products/large/1555507135_635_samsung_galaxy_a60.jpg',
        ];
    }
}
