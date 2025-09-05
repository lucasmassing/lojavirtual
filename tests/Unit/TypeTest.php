<?php

// php artisan test --filter=TypeTest

namespace tests\Unit;

use App\Models\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    // Testa se o tipo é criado com os atributos preenchidos corretamente
    public function test_create_type_with_fillable_attributes()
    {
        $type = new Type([
            'name' => 'Console'
        ]);

        // Afirma que o valor do atributo name é Console
        $this->assertEquals('Console',$type->name);
    }
}