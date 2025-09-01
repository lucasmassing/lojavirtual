<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Type;
use App\Models\Product;

class Type_DB_Test extends TestCase
{
    use RefreshDatabase;

    public function test_type_can_have_products()
    {
        $type = Type::create(['name' => 'Console']);

        $product = Product::create([
            'name' => 'Resident Evil 3',
            'description' => 'Resident Evil 3 de PS1',
            'quantity' => 5,
            'price' => 40.00,
            'type_id' => $type->id,
            'image_path' => 'images/re3.jpg'
        ]);

        $this->assertDatabaseHas('types', ['name' => 'Console']);
        $this->assertDatabaseHas('products',['name' => 'Resident Evil 3']);

        // relação funciona?
        $this->assertTrue($type->products->contains($product));
    }
}
