<?php

namespace Tests\Unit;
use App\Models\Produkty;
use Tests\TestCase;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use auth;
use HasFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class AddToCartTest extends DuskTestCase
{
    use WithoutMiddleware;
     use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function login(Browser $browser)
    {
        $browser->loginAs(User::where('email', 'admin@wp.com')->firstOrFail);
    }


    public function test_add_to_cart()
    {
        $product = Produkty::create([    
            'id' =>97,        
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 0,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Opis testowy',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);
       $response = $this->get('/cart/add/'.$product->id);

       $response->assertRedirect('/');
    }

    public function test_products_menu_details()
    {        
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/Inzynier/public/produkty/menu')
                    ->assertSee('Nasze produkty')                   
                    ->click('@Szczegóły')
                    ->assertPathIs('/Inzynier/public/index/1');
                   
        });
    }

    public function test_products_menu_add_to_cart_without_login()
    {        
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/Inzynier/public/produkty/menu')
                    ->assertSee('Nasze produkty')                     
                    ->click('@Dodaj do koszyka')
                    ->click('@Ok')
                    ->assertPathIs('/Inzynier/public/login');
                   
        });
    }

  
  

}