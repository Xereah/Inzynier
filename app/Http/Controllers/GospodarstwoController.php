<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gospodarstwo;
use App\Models\Produkty;
use App\Models\Zamowienia;
use App\Http\Requests\Gospodarstwo\StoreGospodarstwoRequest;
use App\Http\Requests\Gospodarstwo\UpdateGospodarstwoRequest;
class GospodarstwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gospodarstwo = Gospodarstwo::all();
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        return view('AdminPanel.Gospodarstwo.index', compact('gospodarstwo','produktystanilosc','zamowienia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gospodarstwo = Gospodarstwo::all();
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        if($gospodarstwo->count() == 0)
        return view('AdminPanel.Gospodarstwo.add', compact('gospodarstwo','zamowienia','produktystanilosc'));
        else
        return redirect()->route('gospodarstwo.index')
        ->with('message', 'Nie można dodać więcej niż jednego gospodarstwa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGospodarstwoRequest $request)
    {
        $gospodarstwo = new Gospodarstwo([
            'Imie_Wlasciciel' => $request->input('Imie_Wlasciciel'),
            'Nazwisko_Wlasciciel' => $request->input('Nazwisko_Wlasciciel'),
            'Miejscowosc' => $request->input('Miejscowosc'),
            'Kod_Pocztowy' => $request->input('Kod_Pocztowy'),
            'Poczta_Miejscowosc' => $request->input('Poczta_Miejscowosc'),
            'Telefon' => $request->input('Telefon'),
            'Email' => $request->input('Email'),
        ]);
        // zapisanie w bazie danych
        try {
            $gospodarstwo->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('gospodarstwo.index')
                ->with('message', 'Udało się dodać Gospodarstwo.');
            } catch(\Illuminate\Database\QueryException $e) {
                \Log::error($e);
                // duplikacja klucza - jest to sprawdzane w regułach walidacji
                switch($e->getCode()){
                    case '23000':
                        return redirect()->route('gospodarstwo.index')
                        ->with('message', 'Nie udało się dodać gospodarstwa.');
                        break;
                    default:
                        return redirect()->route('gospodarstwo.index')
                        ->with('message', 'Nie udało się dodać gospodarstwa.');
                }
            }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $gospodarstwo = Gospodarstwo::findOrFail($id);
        return view('AdminPanel.Gospodarstwo.widok', compact('gospodarstwo','produktystanilosc','zamowienia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $gospodarstwo = Gospodarstwo::findOrFail($id);
        return view('AdminPanel.Gospodarstwo.edit', compact('gospodarstwo','produktystanilosc','zamowienia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGospodarstwoRequest $request, $id)
    {
        try{
            $gospodarstwo = Gospodarstwo::find($request->id);
            $gospodarstwo->Imie_Wlasciciel = $request->Imie_Wlasciciel;
            $gospodarstwo->Nazwisko_Wlasciciel = $request->Nazwisko_Wlasciciel;
            $gospodarstwo->Miejscowosc = $request->Miejscowosc;
            $gospodarstwo->Kod_Pocztowy = $request->Kod_Pocztowy;
            $gospodarstwo->Poczta_Miejscowosc = $request->Poczta_Miejscowosc;
            $gospodarstwo->Telefon = $request->Telefon;
            $gospodarstwo->Email = $request->Email;
            $gospodarstwo->save();
            return redirect()->route('gospodarstwo.index')->with('message', 'Udało się zaaktualizować gospodarstwo.');
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('gospodarstwo.index')
                    ->with('message', 'Nie udało się zaktualizować gospodarstwa.');
                    break;
                default:
                    return redirect()->route('gospodarstwo.index')
                    ->with('message', 'Nie udało się zaktualizować gospodarstwa.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gospodarstwo = Gospodarstwo::findOrFail($id);
        $gospodarstwo->delete();

        return redirect()->route('gospodarstwo.index')->with('message', 'Udało się usunąć gospodarstwo.');
    }
}
