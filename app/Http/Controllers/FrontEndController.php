<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;

use DB;

class FrontEndController extends Controller
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
        return view('FrontEnd.Home.home',compact('kategorie','produkty','tasks'));
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
        $tasks= Task::all();
        $kategorie= Kategorie::All();
        $produkty = Produkty::findOrFail($id);
        return view('FrontEnd.Home.ProduktWidok', compact('produkty','kategorie','tasks'));
    }
    public function kategorie($id) {
        //Eloquent ORM
        $tasks= Task::all();
        $kategorie = Kategorie::where('id', $id)->first();
        $kategorie= Kategorie::All();
        $produkty = DB::table('produkty')
        ->where('produkty.fk_kategorie', $id)->get();
        return view('frontEnd.Home.KategorieWidok', compact('produkty','kategorie','kategorie','tasks'));
    }
    public function wyszukiwanie(Request $request)
    {
        $tasks= Task::all();
        $searchData = $request->searchData;
        $kategorie= Kategorie::All();
        // $produkty= DB::table('produkty')
        // ->where('produkty.status', 1)->get();
        $produkty = DB::table('produkty')
                ->where('produkty.status', 1)
                ->where('produkty.Nazwa', 'like', '%'. $searchData .'%')
                ->orWhere('produkty.Cena', 'like', '%'. $searchData .'%')
                ->get();
        return view('FrontEnd.Home.search',compact('produkty','kategorie','tasks'));
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
