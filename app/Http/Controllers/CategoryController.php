<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
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
        return view('Kategorie.index', compact('kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorie = Kategorie::all();
        return view('Kategorie.add', compact('kategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                ->with('success', __('translation.kategorie.create.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('kategorie.index')
                        ->with('error', __('translation.kategorie.create.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('kategorie.index')
                        ->with('error', __('translation.kategorie.create.messages.error'));
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
        return view('Kategorie.widok', compact('kategorie'));
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
        return view('Kategorie.edit', compact('kategorie'));
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
        $kategorie = Kategorie::find($request->id);
        $kategorie->Nazwa = $request->Nazwa;
        $kategorie->Opis = $request->Opis;
        $kategorie->save();
        return redirect()->route('kategorie.index')->with('message', 'Udało się zaaktualizować kategorie.');
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
