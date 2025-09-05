<?php

// php artisan test --filter=ProfileTest

use App\Models\User;

// Verifica se a página de perfil é exibida para um usuário autenticado
test('profile page is displayed', function () {
    $user = User::factory()->create();

    // Simula um GET para a rota /profile
    $response = $this
        ->actingAs($user)
        ->get('/profile');

    $response->assertOk();
});

// Verifica se a informação do perfil pode ser atualizada
test('profile information can be updated', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->patch('/profile', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});

// Verifica se o status de verificação do emaail não muda
test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();

    // Simula a requisição de atualização sem mudar o email
    $response = $this
        ->actingAs($user)
        ->patch('/profile', [
            'name' => 'Test User',
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $this->assertNotNull($user->refresh()->email_verified_at);
});

// Verifica se um usuário consegue deletar sua conta
test('user can delete their account', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete('/profile', [
            'password' => 'password',
        ]);

    // Afirma que o usuário não está mais no banco de dados
    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

// Verifica se uma senha incorreta impede a exclusão da conta
test('correct password must be provided to delete account', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->delete('/profile', [
            'password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrorsIn('userDeletion', 'password')
        ->assertRedirect('/profile');

    // Afirma que o usuário ainda existe no banco de dados
    $this->assertNotNull($user->fresh());
});
