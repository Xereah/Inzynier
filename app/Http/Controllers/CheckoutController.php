<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;
use App\Models\Klienci;
use DB;
use Session;
use Auth;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uzytkownik = Auth::user();
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $cart = Cart::content();
        // if($uzytkownik != NULL){
        //     return redirect('/order/payment'); 
        // } elseif($customerId != NULL && $shippingId == NULL) {
        //     return redirect('/checkout/shipping'); 
        // } else {
        //     return view('FrontEnd.Checkout.CheckoutContent'); 
        // }  
        return view('FrontEnd.Checkout.CheckoutContent',compact('uzytkownik','tasks','kategorie','cart')); 
    }

    public function ZapisInformacjiOKupujacym(Request $request) {
     
        $klienci = new Klienci();
        $klienci->name = $request->name;
        $klienci->surname = $request->surname;
        $klienci->email = $request->email;
        $klienci->phone = $request->phone;
        $klienci->adress = $request->adress;
        $klienci->save();

         $shippingId = $klienci->id;
         Session::put('shippingId', $shippingId);
         return redirect('/order/payment');
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
