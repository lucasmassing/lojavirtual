<?php

namespace Tests\Unit;

use tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /** @test */
    // testando se o produto tem todos os atributos válidos
    public function create_produtc_with_fillabe_attributes(){
        $product = new Product([
            'name' => 'Metal Gear Solid',
            'description' => 'Metal Gear Solid de PS2',
            'quantity' => 1,
            'price' => 50.00,
            'type_id' => 2,
            'image_path' => 'images/mgs2.jpg'
        ]);

        $this->assertEquals('Metal Gear Solid', $product->name);
        $this->assertEquals('Metal Gear Solid de PS2', $product->description);
        $this->assertEquals(1, $product->quantity);
        $this->assertEquals(50.00, $product->price);
        $this->assertEquals(2, $product->type_id);
        $this->assertEquals('images/mgs2.jpg', $product->image_path);
    }
}
