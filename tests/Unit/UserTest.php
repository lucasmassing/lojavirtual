<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
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

        $this->assertEquals(
            ['password', 'remember_token'],
            $user->getHidden()
        );
    }
}
