<?php

namespace Tests\Feature;

use App\Models\Produkty;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class LandingPageTest extends TestCase
{
    
    use DatabaseTransactions;
    /** @test */
    public function test_landing_page_loads_correctly()
    {
        //Arrange

        //Act
        $response = $this->get('/index');

        //Assert
        $response->assertStatus(200);
       
        $response->assertSee('Popularne produkty');
        $response->assertSee('Codziennie przygotowujemy swoje produkty');
    }

    public function test_product_is_not_visible()
    {
        
        $produkt = Produkty::create([            
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 100,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Test',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);
      
        
        $response = $this->get('/index');
      
        $response->assertDontSee($produkt->Nazwa);
        
    }

  
    
}