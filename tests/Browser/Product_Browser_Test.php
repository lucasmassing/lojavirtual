<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use PHPUnit\Framework\Attributes\Test;

class Product_Browser_Test extends DuskTestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_displays_product_in_browser_with_manual_login()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();

            $browser->loginAs($user)
                    ->visit('/dashboard') // Altere aqui para a rota correta
                    ->assertSee('Dashboard de Produtos');
        });
    }
}