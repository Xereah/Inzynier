<?php

namespace Tests\Feature;

use App\Models\Produkty;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductDetailsTest extends TestCase
{
    

    /** @test */
    public function test_can_view_product_details()
    {
        $product = Produkty::create([    
            'id' =>99,        
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 100,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Opis testowy',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);

        $response = $this->get('/index/'.$product->id);

        $response->assertStatus(200);
        $response->assertSee('Test');
        $response->assertSee('Opis testowy');
       
    }

    public function test_stock_level_none()
    {
        $product = Produkty::create([    
            'id' =>98,        
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 0,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Opis testowy',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);

       $response = $this->get('/index/'.$product->id);

        $response->assertSee('Niestety nie mamy już tego produktu na stanie');
    }

    public function test_stock_level_ok()
    {
        $product = Produkty::create([    
            'id' =>97,        
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 10,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Opis testowy',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);

       $response = $this->get('/index/'.$product->id);

        $response->assertSee('Dodaj do koszyka');
    }
    
}