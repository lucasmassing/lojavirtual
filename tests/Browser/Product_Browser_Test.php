<?php

// Verificar se no arquivo .env está o caminho http://127.0.0.1:8000
// php artisan dusk --filter=Product_Browser_Test

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use PHPUnit\Framework\Attributes\Test;

// Simula a navegação de um usuário acessando o Dashboard de produtos
class Product_Browser_Test extends DuskTestCase
{
    // Limpa o banco de dados antes do teste
    use RefreshDatabase;

    #[Test]
    public function it_displays_product_in_browser_with_manual_login()
    {
        // Cria um usuário usando a factory do Laravel para ser usado no teste
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();

            // Simula as ações do usuário
            $browser->loginAs($user)
                    ->visit('/dashboard') // Altere aqui para a rota correta
                    ->assertSeeIn('h2','Dashboard de Produtos');
        });
    }
}