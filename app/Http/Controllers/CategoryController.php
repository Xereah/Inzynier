<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
use App\Http\Requests\Kategorie\StoreKategorieRequest;
use App\Http\Requests\Kategorie\UpdateKategorieRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorie = Kategorie::all();
        return view('AdminPanel.Kategorie.index', compact('kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorie = Kategorie::all();
        return view('AdminPanel.Kategorie.add', compact('kategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategorieRequest $request)
    {
        $kategorie = new Kategorie([
            'Nazwa' => $request->input('Nazwa'),
            'Opis' => $request->input('Opis'),
        ]);
        // zapisanie w bazie danych
        try {
            $kategorie->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('kategorie.index')
                ->with('message', 'Udało się dodać Kategorie.');
            } catch(\Illuminate\Database\QueryException $e) {
                \Log::error($e);
                // duplikacja klucza - jest to sprawdzane w regułach walidacji
                switch($e->getCode()){
                    case '23000':
                        return redirect()->route('kategorie.index')
                        ->with('message', 'Nie udało się dodać kategorii.');
                        break;
                    default:
                        return redirect()->route('kategorie.index')
                        ->with('message', 'Nie udało się dodać kategorii.');
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
        $kategorie = Kategorie::findOrFail($id);
        return view('AdminPanel.Kategorie.widok', compact('kategorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategorie = Kategorie::findOrFail($id);
        return view('AdminPanel.Kategorie.edit', compact('kategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategorieRequest $request, $id)
    {
        try{
        $kategorie = Kategorie::find($request->id);
        $kategorie->Nazwa = $request->Nazwa;
        $kategorie->Opis = $request->Opis;
        $kategorie->save();
        return redirect()->route('kategorie.index')->with('message', 'Udało się zaaktualizować kategorie.');
    } catch(\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        // duplikacja klucza - jest to sprawdzane w regułach walidacji
        switch($e->getCode()){
            case '23000':
                return redirect()->route('kategorie.index')
                ->with('message', 'Nie udało się zaktualizować kategorii.');
                break;
            default:
                return redirect()->route('kategorie.index')
                ->with('message', 'Nie udało się zaktualizować kategorii.');
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
        $kategorie = Kategorie::findOrFail($id);
        $kategorie->delete();

        return redirect()->route('kategorie.index')->with('message', 'Udało się usunąć kategorie.');
    }
}
