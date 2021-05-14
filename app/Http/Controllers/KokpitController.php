<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\Produkty;
use App\Models\Zamowienia;
use App\Models\User;
use App\Models\Task;
class KokpitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produkty=Produkty::all();
        $uzytkownicy=User::all()->count();
        $produkty=Produkty::all()->count();
        $termin=Task::all()->last();
        $user=Auth::user();
        $zamowieniawidok= DB::table('zamowienie')
        ->join('users', 'users.id', '=', 'zamowienie.fk_uzytkownik')
        ->join('platnosc', 'platnosc.id', '=', 'zamowienie.fk_platnosc')
        ->select('zamowienie.*', 'users.name', 'users.surname', 'platnosc.platnosc')
        ->take(10)->get();
        $produktylista=Produkty::all()->take(5);
        $produktystan=Produkty::where('produkty.Ilosc',0)->get();
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        return view('home',compact('produkty','user','zamowienia','uzytkownicy','produkty','termin','zamowieniawidok','produktylista','produktystan','produktystanilosc'));
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
