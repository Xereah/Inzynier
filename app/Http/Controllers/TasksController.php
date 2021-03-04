<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Kategorie;


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
        return view('AdminPanel.Kalendarz.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Kalendarz.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return view('AdminPanel.Kalendarz.widok', compact('task','kategorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('AdminPanel.Kalendarz.edit', compact('task'));
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
