@extends('FrontEnd.FrontEndSzablon3')

@section('css-styles')
<link href="{{ asset('css/online.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Płatność')
@section('content')
<div class="w3l_banner_nav_right" style="background-color:white;">
    
<section class="section-pagetop bg">
<div class="container">
<ul class="progress-indicator">
            <li class="completed">
                <span class="bubble"></span>
                Koszyk. <br>
            </li>
            <li class="completed">
                <span class="bubble"></span>
                Dane klienta. <br>
            </li>
            <li class="completed">
                <span class="bubble"></span>
                Wybór płatności. <br>
            </li>
            <li class="active">
                <span class="bubble"></span>
                Płatność. <br>
            </li>
            <li>
                <span class="bubble"></span>
                Podsumowanie
            </li>
           
        </ul>
</div> <!-- container //  -->
</section>


    <br><br>
    <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header">Płatność</span>
                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>
                    <form> <span>Imie i Nazwisko:</span> <input placeholder="Linda Williams"> <span>Numer Karty:</span> <input placeholder="0125 6780 4567 9909">
                        <div class="row">
                            <div class="col-4"><span>Data:</span> <input placeholder="YY/MM"> </div>
                            <div class="col-4"><span>CVV:</span> <input id="cvv"> </div>
                        </div> <input type="checkbox" id="save_card" class="align-left"> <label for="save_card">Zapisz informacje o karcie</label>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Podsumowanie</div>
                    <p>{{ Cart::content()->count() }} przedmioty</p>
                    @foreach(Cart::content() as $cartProduct)
                    <div class="row item">
                        <div class="col-4 align-self-center"><img class="img-fluid" src="{{ asset($cartProduct->options->img) }}"></div>
                        <div class="col-8">
                       
                        <div class="row"><b> {{$cartProduct->name}}</b></div>
                            <div class="row"><b>{{$cartProduct->price}} zł</b></div>
                            <div class="row">Sztuk {{$cartProduct->qty}}</div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Cena całkowita</div>
                        <div class="col text-right">{{Cart::subtotal()}} zł</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Dostawa</div>
                        <div class="col text-right">Darmowa</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Do zapłaty</b></div>
                        <div class="col text-right"><b>{{Cart::subtotal()}} zł</b></div>
                    </div>
                    <div class="row lower">
                       
                    </div><a href="{{ url('/order/order-success') }}" class="btn btn-primary float-md-right"> Złóż zamówienie </a>
                    <p class="text-muted text-center">Zwroty nie są przyjmowane</p>
                </div>
            </div>
        </div>
    </div>
    <div> </div>
</div>
@endsection