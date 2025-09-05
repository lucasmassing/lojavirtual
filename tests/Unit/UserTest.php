<?php

// php artisan test --filter=UserTest

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    // Verifica se as propriedades do Model User tem os atributos necessários
    public function test_user_has_expected_fillable_attributes()
    {
        $user = new User();

        $this->assertEquals(
            ['name', 'email', 'password'],
            $user->getFillable()
        );
    }

    public function test_user_has_expected_hidden_attributes()
    {
        $user = new User();

        // Verifica se o usuário do Array é o mesmo esperado
        $this->assertEquals(
            ['password', 'remember_token'],
            $user->getHidden()
        );
    }
}
