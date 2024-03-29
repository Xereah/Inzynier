<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kategorie;
use App\Models\Produkty;
use App\Models\Platnosc;
use App\Models\Zamowienia;
use App\Models\ZamowienieSzczegoly;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class AddToDatabaseTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_add_category()    
    {        
        $kategorie = Kategorie::create([
            'Nazwa' => 'Miody',
            'Opis' => 'LoremIpsum',
        ]);
        $this->assertDatabaseHas('Kategorie',['Nazwa'=>$kategorie->Nazwa,'Opis'=>$kategorie->Opis]);
        $this->assertNotEmpty($kategorie);
    }



    public function test_can_add_product()    
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
        $this->assertDatabaseHas('Produkty',[
            'Nazwa'=>$produkt->Nazwa,
            'Cena'=>$produkt->Cena,
            'Zdjecie'=>$produkt->Zdjecie,
            'Ilosc'=>$produkt->Ilosc,
            'JednostkaMiary'=>$produkt->JednostkaMiary,
            'Opis'=>$produkt->Opis,
            'fk_kategorie'=>$produkt->fk_kategorie,
            'status'=>$produkt->status
        ]);
        $this->assertNotEmpty($produkt);
    }

    public function test_can_add_payment()    
    {        
        $platnosc = Platnosc::create([
            'platnosc' => 'test'
            
        ]);
        $this->assertDatabaseHas('Platnosc',['platnosc'=>$platnosc->platnosc]);
        $this->assertNotEmpty($platnosc);
    }

    public function test_can_add_store()    
    {
        
        $zamowienie = Zamowienia::create([            
             'fk_uzytkownik' => 1,
             'fk_platnosc' => 1,
             'ZamowienieStatus' => 'test',
             'ZamowienieKoszt' => 1
             
        ]);
        $this->assertDatabaseHas('zamowienie',[
            'fk_uzytkownik'=>$zamowienie->fk_uzytkownik,
            'fk_platnosc'=>$zamowienie->fk_platnosc,
            'ZamowienieStatus'=>$zamowienie->ZamowienieStatus,
            'ZamowienieKoszt'=>$zamowienie->ZamowienieKoszt
           
        ]);
        $this->assertNotEmpty($zamowienie);
    }

    public function test_can_add_storeDetails()    
    {
        
        $zamowienieszczegoly = ZamowienieSzczegoly::create([            
             'fk_produkt' => 1,
             'fk_zamowienie' => 1,
             'ProduktNazwa' => 'test',
             'ProduktCena' => 1,
             'ProduktIlosc' => 1,
             
        ]);
        $this->assertDatabaseHas('zamowienie_szczegoly',[
            'fk_produkt'=>$zamowienieszczegoly->fk_produkt,
            'fk_zamowienie'=>$zamowienieszczegoly->fk_zamowienie,
            'ProduktNazwa'=>$zamowienieszczegoly->ProduktNazwa,
            'ProduktCena'=>$zamowienieszczegoly->ProduktCena,
            'ProduktIlosc'=>$zamowienieszczegoly->ProduktIlosc
           
        ]);
        $this->assertNotEmpty($zamowienieszczegoly);
    }

}