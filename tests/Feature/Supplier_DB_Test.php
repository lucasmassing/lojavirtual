<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Supplier;

class Supplier_DB_Test extends TestCase
{
    use RefreshDatabase;

    public function test_supplier_can_be_created_DB()
    {
        $supplier = Supplier::create([
            'type_enum' => 'J',
            'name_reason' => 'Sony',
            'cpf_cnpj' => '12345678765',
            'phone' => '5498560234'
        ]);

        $this->assertDatabaseHas('suppliers',[
            'name_reason' => 'Sony',
            'cpf_cnpj' => '12345678765'
        ]);
    }
}