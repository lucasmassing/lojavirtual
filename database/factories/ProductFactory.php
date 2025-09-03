<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    // Database\Factories\ProductFactory.php

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),  // Adicionando um valor de quantidade padrão
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'type_id' => Type::factory(),  // Criando o tipo automaticamente
        ];
    }
}
