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
            'name' => 'God of War 2',
            'description' => 'God of War 2 de PS2',
            'quantity' => 10,
            'price' => 20.00,
            'type_id' => $type->id,
            'image_path' => 'images/god2.jpg'
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'God of War 2',
            'description' => 'God of War 2',
        ]);
    }
}
