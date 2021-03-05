<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkty;
use App\Models\Kategorie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produkty = Produkty::all();
        $kategorie = Kategorie::all();
        return view('AdminPanel.Produkty.index', compact('produkty','kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produkty = Produkty::all();
        $kategorie = Kategorie::all();
        return view('AdminPanel.Produkty.add', compact('produkty','kategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request) {
        //return $request->all();
try{
        $productImage = $request->file('Zdjecie'); //for retrieving image from form
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/Zdjecia/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request, $imageUrl);

        return redirect()->route('produkt.index')->with('message', 'Udało się dodać produkt!');
    } catch(\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        // duplikacja klucza - jest to sprawdzane w regułach walidacji
        switch($e->getCode()){
            case '23000':
                return redirect()->route('produkt.index')
                ->with('message', 'Nie udało się dodać produktu.');
                break;
            default:
                return redirect()->route('produkt.index')
                ->with('message', 'Nie udało się dodać produktu.');
        }
    }
    }

    protected function saveProductInfo($request, $imageUrl) {
        //store ifo in DB using Eloquent ORM
        $produkty = new Produkty();
        $produkty->Nazwa = $request->Nazwa;
        $produkty->Cena = $request->Cena;
        $produkty->Ilosc = $request->Ilosc;
        $produkty->JednostkaMiary = $request->JednostkaMiary;
        $produkty->Opis = $request->Opis;
        $produkty->fk_kategorie = $request->fk_kategorie;
        $produkty->status = $request->status;
        $produkty->Zdjecie = $imageUrl;
     
        $produkty->save();
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
        $produkty = Produkty::findOrFail($id);
         return view('AdminPanel.Produkty.widok', compact('produkty','kategorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produkty = Produkty::findOrFail($id);
        $kategorie = Kategorie::all();
        return view('AdminPanel.Produkty.edit', compact('produkty','kategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        try{
        $imageUrl = $this->imageExistStatus($request);
        $this->updateProductInfo($request, $imageUrl);
        return redirect()->route('produkt.index')->with('message', 'Udało się dokonać aktualizacji.');
    } catch(\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        // duplikacja klucza - jest to sprawdzane w regułach walidacji
        switch($e->getCode()){
            case '23000':
                return redirect()->route('produkt.index')
                ->with('message', 'Nie udało się zaktualizować produktu.');
                break;
            default:
                return redirect()->route('produkt.index')
                ->with('message', 'Nie udało się zaktualizować produktu.');
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
        $produkty = Produkty::findOrFail($id);

        // usunięcie produkty
        $produkty->delete();

        return redirect()->route('produkt.index')->with('message', 'Udało się usunąć produkt.');
    }

    private function imageExistStatus($request)
    {
        $productById = Produkty::where('id', $request->id)->first();
        $productImage = $request->file('Zdjecie');
        if($productImage){
            $imageName = $productImage->getClientOriginalName();
            $uploadPath = 'Zdjecie/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $productById->productImage;   
        }
        return $imageUrl;
    }


    private function updateProductInfo($request, $imageUrl) {
        $produkty = Produkty::find($request->id);
        $produkty->Nazwa = $request->Nazwa;
        $produkty->Cena = $request->Cena;
        $produkty->Ilosc = $request->Ilosc;
        $produkty->JednostkaMiary = $request->JednostkaMiary;
        $produkty->Opis = $request->Opis;
        $produkty->Zdjecie = $imageUrl;
        $produkty->fk_kategorie = $request->fk_kategorie;
        $produkty->status = $request->status;
        $produkty->save();
    }

}
