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
use App\Models\ZamowienieSzczegoly;
use App\Models\Gospodarstwo;
use DB;
use Session;
use Auth;

class ZamowieniaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zamowienia = DB::table('zamowienie')
                ->join('users', 'users.id', '=', 'zamowienie.fk_uzytkownik')
                ->join('platnosc', 'platnosc.id', '=', 'zamowienie.fk_platnosc')
                ->select('zamowienie.*', 'users.name', 'users.surname', 'platnosc.platnosc')
                ->get();
        return view('AdminPanel.Zamowienia.ZamowieniaWidok',compact('zamowienia'));
    }


    public function UsunZamowienie($id)
    {
        $zamowienie = Zamowienia::where('id', $id)->first();
        if($zamowienie->ZamowienieStatus == 'W oczekiwaniu'){
            $zamowienie->delete();
        }elseif($zamowienie->ZamowienieStatus == 'Potwierdzone'){
            $zamowienie->ZamowienieStatus = 'Sprzedane';
            $zamowienie->save();
        }
        return redirect('/zamowienia');
    }

    public function edycjaZamowienia($id)
    {
        $zamowienie = Zamowienia::where('id', $id)->first();
        if($zamowienie->ZamowienieStatus == 'W oczekiwaniu'){
            $zamowienie->ZamowienieStatus = 'Potwierdzone';
        }
        $zamowienie->save();
        return redirect('/zamowienia');
    }

    public function podgladZamowienia($id)
    {
        $zamowienia = Zamowienia::findOrFail($id);
        $zamowieniaSzczegoly = ZamowienieSzczegoly::where('fk_zamowienie', $id)->get();
        $gospodarstwo=Gospodarstwo::all();
        $platnosc= Platnosc::all();
        //return view('admin.order.viewInvoice', ['order'=>$order]);
        return view('AdminPanel.Zamowienia.ZamowieniaSzczegoly', compact('zamowienia','zamowieniaSzczegoly','gospodarstwo','platnosc'));
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
