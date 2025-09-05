<?php

// php artisan test --filter=Supplier_DB_Test

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Supplier;

// Cria um fornecedor e verifica se os dados foram salvos no banco
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

        // Afirma que a tabela fornecedores contem os registros fornecidos
        $this->assertDatabaseHas('suppliers',[
            'name_reason' => 'Sony',
            'cpf_cnpj' => '12345678765'
        ]);
    }
}