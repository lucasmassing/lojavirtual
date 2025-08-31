<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Type;

class Product_DB_Test extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created_and_persisted()
    {
        $type = Type::create(['name' => 'Console']);

        $product = Product::create([
            'name' => 'PS5',
            'description' => 'PlayStation 5 novo',
            'quantity' => 10,
            'price' => 5000.00,
            'type_id' => $type->id,
            'image_path' => 'images/ps5.jpg'
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'PS5',
            'description' => 'PlayStation 5 novo',
        ]);
    }
}
