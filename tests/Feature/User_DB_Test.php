<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class User_DB_Test extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created_and_persisted()
    {
        $user = User::create([
            'name' => 'Lucas',
            'email' => 'lucas@email.com',
            'password' => bcrypt('secret123')
        ]);

        $this->assertDatabaseHas('users',[
            'email' => 'lucas@email.com'
        ]);

        // senha nunca deve ser salva em texto plano
        $this->assertNotEquals('secret123',$user->password);
    }

    public function test_user_password_is_hidden()
    {
        $user = User::create([
            'name' => 'Ana',
            'email' => 'ana@email.com',
            'password' => bcrypt('123456')
        ]);

        $userArray = $user->toArray();

        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
    }
}
