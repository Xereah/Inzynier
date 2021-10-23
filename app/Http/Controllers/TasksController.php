<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Kategorie;
use App\Models\Produkty;
use App\Models\Zamowienia;
use App\Http\Requests\Kalendarz\StoreKalendarzRequest;
use App\Http\Requests\Kalendarz\UpdateKalendarzRequest;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        return view('AdminPanel.Kalendarz.index', compact('tasks','produktystanilosc','zamowienia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        return view('AdminPanel.Kalendarz.add',compact('produktystanilosc','zamowienia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKalendarzRequest $request)
    {
        Task::create($request->all());
        return redirect()->route('task.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategorie = Kategorie::all();
        $task = Task::findOrFail($id);
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        return view('AdminPanel.Kalendarz.widok', compact('task','kategorie','produktystanilosc','zamowienia'));
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
        $task = Task::findOrFail($id);
        return view('AdminPanel.Kalendarz.edit', compact('task','produktystanilosc','zamowienia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKalendarzRequest $request, $id)
    {
        try{
            $task = Task::find($request->id);
            $task->Nazwa = $request->Nazwa;
            $task->Opis = $request->Opis;
            $task->Data = $request->Data;
           
            $task->save();
            return redirect()->route('task.index')->with('message', 'Udało się zaaktualizować Kalendarz.');
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('task.index')
                    ->with('message', 'Nie udało się zaktualizować kategorii.');
                    break;
                default:
                    return redirect()->route('task.index')
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
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('message', 'Udało się usunąć Wpis.');
    }
}
