<?php

namespace Tests\Feature;

use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class UpdateDatabaseTest extends TestCase
{
    use DatabaseTransactions;
    
  
    public function test_update_users()
    {   
        $data['name'] = 'Test1';
		
        $user = User::first();

        $user->update($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertTrue(true);

    }

    public function test_update_products()
    {   
        $data = ([       
            'Nazwa' => 'Test',
            'Cena' => 3,
            'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
            'Ilosc' => 100,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Opis testowy',
            'fk_kategorie' => 1,
            'status' => 1,
       ]);
		
        $produkty = Produkty::first();

        $produkty->update($data);

        $this->assertInstanceOf(Produkty::class, $produkty);

        $this->assertEquals(
            $data['Nazwa'], $produkty->Nazwa,
            $data['Cena'], $produkty->Cena,
            $data['Zdjecie'], $produkty->Zdjecie,
            $data['Ilosc'], $produkty->Ilosc,
            $data['JednostkaMiary'], $produkty->JednostkaMiary,
            $data['Opis'], $produkty->Opis,
            $data['fk_kategorie'], $produkty->fk_kategorie,
            $data['status'], $produkty->status,   
        
        );
        $this->assertTrue(true);

    }

    public function test_update_category()
    {   
        $data = ([       
            'Nazwa' => 'TestCategory',
            'Opis' => 'TestCategory',
       ]);
		
        $kategorie = Kategorie::first();
        $kategorie->update($data);

        $this->assertInstanceOf(Kategorie::class, $kategorie);

        $this->assertEquals(
            $data['Nazwa'], $kategorie->Nazwa,
            $data['Opis'], $kategorie->Opis,
        );
        $this->assertTrue(true);

    }

    
    
}