<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;
use App\Models\Klienci;
use App\Models\Platnosc;
use App\Models\Zamowienia;
use App\Models\Gospodarstwo;
use App\Models\ZamowienieSzczegoly;
use DB;
use Session;
use Auth;
class ZamowieniaKlientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks= Task::all();
        $produkty= DB::table('produkty')
        ->where('produkty.status', 1)->get();
        $kategorie = Kategorie::all();
        $cart = Cart::content();
        $uzytkownik = Auth::user();
        $gospodarstwo=Gospodarstwo::all();
        $zamowienia = Zamowienia::where('zamowienie.fk_uzytkownik','=', $uzytkownik->id)->get();
        return view('FrontEnd.Zamowienia.zamowienieklient', compact('zamowienia','kategorie','produkty','tasks','gospodarstwo','cart','uzytkownik'));
    }

    public function podgladZamowienia($id)
    {
        $zamowienia = Zamowienia::findOrFail($id);
        $zamowieniaSzczegoly = ZamowienieSzczegoly::where('fk_zamowienie', $id)->get();
        $gospodarstwo=Gospodarstwo::all();
        $platnosc= Platnosc::all();
        //return view('admin.order.viewInvoice', ['order'=>$order]);
        return view('FrontEnd.Zamowienia.ZamowieniaKlientSzczegoly', compact('zamowienia','zamowieniaSzczegoly','gospodarstwo','platnosc'));
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
