<?php

namespace tests\Unit;

use App\Models\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function test_create_type_with_fillable_attributes()
    {
        $type = new Type([
            'name' => 'Console'
        ]);

        $this->assertEquals('Console',$type->name);
    }
}