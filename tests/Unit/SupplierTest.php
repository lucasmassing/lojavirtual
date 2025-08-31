<?php

namespace Tests\Unit;

use App\Models\Supplier;
use PHPUnit\Framework\TestCase;

class SupplierTest extends TestCase
{
    public function test_create_supplier_with_fillable_attributes()
    {
        $suppier = new Supplier([
            'type_enum' => 'J',
            'name_reason' => 'Konami LTDA',
            'cpf_cnpj' => '1234567890199',
            'phone' => '(11) 9999-9999'
        ]);

        $this->assertEquals('J',$suppier->type_enum);
        $this->assertEquals('Konami LTDA',$suppier->name_reason);
        $this->assertEquals('1234567890199',$suppier->cpf_cnpj);
        $this->assertEquals('(11) 9999-9999',$suppier->phone);
        
    }
}
