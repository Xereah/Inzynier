<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkty;

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
        return view('Produkty.index', compact('produkty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produkty = Produkty::all();
        return view('Produkty.add', compact('produkty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request) {
        //return $request->all();

        $productImage = $request->file('Zdjecie'); //for retrieving image from form
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/Zdjecia/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request, $imageUrl);

        return redirect()->route('produkt.index')->with('message', 'Udało się dodać produkt!');
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
        $produkty = Produkty::findOrFail($id);
        // $kategorie = kategorie::findOrFail($id);
         return view('Produkty.widok', compact('produkty'));
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
        return view('Produkty.edit', compact('produkty'));
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
        $imageUrl = $this->imageExistStatus($request);
        $this->updateProductInfo($request, $imageUrl);
        return redirect()->route('produkt.index')->with('message', 'Udało się dokonać aktualizacji.');
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
        $produkty->save();
    }

}
