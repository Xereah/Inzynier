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

   

  
    
}