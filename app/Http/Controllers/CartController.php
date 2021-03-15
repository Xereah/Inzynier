<?php

namespace App\Http\Controllers;
use Cart;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;
use App\Models\Platnosc;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $cart = Cart::content();
        $produkty=Produkty::all();
        $platnosc=Platnosc::all();
        return view('FrontEnd.Koszyk.cart', compact('cart','kategorie','tasks','platnosc','produkty'));
    }


    public function dodawaniedokarty($id)
    {
        $produkt = Produkty::find($id);
        Cart::add(['id' => $produkt->id, 'name' => $produkt->Nazwa, 'qty' => 1,
            'price' => $produkt->Cena,
            'options'=> [
                'img' => $produkt->Zdjecie,
                'perimeter' => $produkt->JednostkaMiary,
                'pdQty' => $produkt->Ilosc,
            ]
          ]);
        return back();
    }
    
    public function usuwaniezkarty($id)
    {
        Cart::remove($id);
        return back();
    }
    
    public function aktualizacjakarty(Request $request)
    {
        $qty = $request->newQty;
        $rowId = $request->rowId;
        //update Cart
        Cart::update($rowId, $qty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
