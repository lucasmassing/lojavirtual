<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Type;

class Product_Type_DB_Test extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_belongs_to_type()
    {
        $type = Type::create(['name' => 'Console']);

        $product = Product::create([
            'name' => 'Call Of Duty WAW',
            'description' => 'Call of Duty World at War',
            'quantity' => 10,
            'price' => 50.00,
            'type_id' => $type->id,
            'image_path' => 'images/cod.jpg'
        ]);

        // verifica se o produto aponta para o tipo
        $this->assertEquals('Console', $product->type->name);

        // verifica se o tipo conhece o produto
        $this->assertTrue($type->products->contains($product));
    }
}
