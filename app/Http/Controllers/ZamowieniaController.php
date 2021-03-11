<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Produkty;
use App\Models\Kategorie;
use App\Models\Task;
use App\Models\Klienci;
use App\Models\Platnosc;
use App\Models\Zamowienia;
use DB;
use Session;
use Auth;

class ZamowieniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MetodyPlatnosci()
    {
        $uzytkownik = Auth::user();
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $cart = Cart::content();
        $platnosc=Platnosc::all();
        return view('FrontEnd.Zamowienia.platnosc', compact('uzytkownik','kategorie','tasks','cart','platnosc'));
        
    }
    public function InformacjeZamowienie(Request $request) {
        $platnosc = $request->platnosc;

        if ($platnosc == '1') {
            $paymentId = 1;
            $orderId = $this->saveOrder($paymentId);
            $this->saveOrderDetails($orderId);
            return redirect('/order/order-success');
        } elseif ($platnosc == '2') {
            return 'Jeszczenie nie mamy platności online';
        } 
        }

        public function ZamowienieSukces()
        {
        $uzytkownik = Auth::user();
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $cart = Cart::content();
        if ($uzytkownik != NULL ) {
                return view('FrontEnd.Zamowienia.ZamowienieSukcess',compact('uzytkownik','tasks','kategorie','cart'));
            } else {
                return redirect('/cart');    
            }
        }
        private function savePaymentInfo($paymentType)
        {
            $payment = new Platnosc();
            $payment->platnosc = $paymentType;
            $payment->save();
            return $payment->id;
        }
        
        private function saveOrder($paymentId)
        {
            $order = new Zamowienia();
            $UserId = Auth::user()->id;
            

            $order->fk_uzytkownik = $UserId;
            $order->ZamowienieStatus="ok";
            $order->fk_platnosc = $paymentId;
            $subtotal = str_replace(",", "", Cart::subtotal());
           
            $total = $subtotal;
            //
            $order->ZamowienieKoszt = $total;
            $order->save();
            return $order->id;
        }
        
        private function saveOrderDetails($orderId)
        {
            $contents = Cart::content();
            $orderData = array();
            foreach ($contents as $content) {
                $orderData['fk_zamowienie'] = $orderId;
                $orderData['fk_produkt'] = $content->id;
                $orderData['ProduktNazwa'] = $content->name;
                $orderData['ProduktCena'] = $content->price;
                $orderData['ProduktIlosc'] = $content->qty;
                DB::table('zamowienie_szczegoly')->insert($orderData);
            }
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