<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;
use App\Models\Gospodarstwo;

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
        $cart = Cart::content();
        $gospodarstwo=Gospodarstwo::all();
        return view('FrontEnd.Home.home',compact('kategorie','produkty','tasks','gospodarstwo','cart'));
    }
    public function ProduktyMenu()
    {
        $tasks= Task::all();
       
        $produkty= DB::table('produkty')
        ->where('produkty.status', 1)->simplePaginate(6);
        $kategorie = Kategorie::all();
        $gospodarstwo=Gospodarstwo::all();
        return view('FrontEnd.Home.ProduktyMenu',compact('kategorie','produkty','tasks','gospodarstwo'));
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
        $gospodarstwo=Gospodarstwo::all();
       
        $kategoria1 = Produkty::where('id', $id)->first();
        return view('FrontEnd.Home.ProduktWidok', compact('produkty','kategorie','tasks','gospodarstwo','kategoria1'));
    }
    public function kategorie($id) {
        $tasks= Task::all();
        $kategoria1 = Kategorie::where('id', $id)->first();
        $kategorie= Kategorie::All();
        $produkty = DB::table('produkty')
        ->where('produkty.fk_kategorie', $id)
        ->where('produkty.status', 1)->simplePaginate(3);
        $gospodarstwo=Gospodarstwo::all();
        return view('frontEnd.Home.KategorieWidok', compact('produkty','kategorie','kategoria1','tasks','gospodarstwo'));
    }
    public function wyszukiwanie(Request $request)
    {
        $tasks= Task::all();
        $searchData = $request->searchData;
        $kategorie= Kategorie::All();
        $produkty = DB::table('produkty')
                ->where('produkty.status', 1)
                ->where('produkty.Nazwa', 'like', '%'. $searchData .'%')
                ->orWhere('produkty.Cena', 'like', '%'. $searchData .'%')
                ->get();
        $gospodarstwo=Gospodarstwo::all();
        return view('FrontEnd.Home.search',compact('produkty','kategorie','tasks','gospodarstwo'));
    }

    public function wyszukiwaniecena(Request $request)
    {
        $tasks= Task::all();
        
        $searchData1 = $request->searchData1;
        $searchData2 = $request->searchData2;
        $searchData3 = $request->searchData3;
        $kategoria1 = Kategorie::where('id', $searchData3)->first();
        $kategorie= Kategorie::All();
        $produkty = DB::table('produkty')
                ->where('produkty.status', 1)
                ->where('produkty.fk_kategorie', [ $searchData3])
                ->whereBetween('produkty.Cena',[ $searchData1,$searchData2])
                ->get();
        $gospodarstwo=Gospodarstwo::all();
   
        return view('FrontEnd.Home.search',compact('produkty','kategorie','kategoria1','tasks','gospodarstwo'));
    }
}
