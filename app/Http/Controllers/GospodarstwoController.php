<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gospodarstwo;
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
        return view('AdminPanel.Gospodarstwo.index', compact('gospodarstwo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gospodarstwo = Gospodarstwo::all();
        return view('AdminPanel.Gospodarstwo.add', compact('gospodarstwo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $gospodarstwo = Gospodarstwo::findOrFail($id);
        return view('AdminPanel.Gospodarstwo.widok', compact('gospodarstwo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gospodarstwo = Gospodarstwo::findOrFail($id);
        return view('AdminPanel.Gospodarstwo.edit', compact('gospodarstwo'));
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
