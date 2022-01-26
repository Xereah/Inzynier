@extends('FrontEnd.FrontEndSzablon3')

@section('css-styles')
<link href="{{ asset('css/online.css') }}" rel="stylesheet" type="text/css" />
<style>
input:valid {
    border-color: black;
}
</style>
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
                            <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img
                                    src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img
                                    src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                        </div>
                        <form action="{{ url('/order/order-success') }}">
                            <label for="validationDefault01" class="form-label">Imie</label>
                            <input type="text" placeholder="Jan " class="form-control" pattern="[A-Za-z]{1,32}"
                                id="validationDefault01" required>
                            <label for="validationDefault01" class="form-label">Nazwisko</label>
                            <input type="text" placeholder="Kowalski" class="form-control" pattern="[A-Za-z]{1,32}"
                                id="validationDefault01" required>
                            <label for="validationDefault02" class="form-label">Numer karty</label>
                            <input type="text" placeholder="0125 6780 4567 9909" pattern="[0-9]{13,16}"
                                class="form-control" id="validationDefault02" required>
                            <div class="row">
                                <div class="col-4">
                                    <label for="validationDefault03" class="form-label">Data:</label>
                                    <input type="text" placeholder="YY/MM" class="form-control"
                                        pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" id="validationDefault03" required>
                                </div>
                                <div class="col-4">
                                    <label for="validationDefault04" class="form-label">CVV:</label>
                                    <input class="form-control" id="field" placeholder="381" type="number" max="999"
                                        pattern="([0-9]|[0-9]|[0-9])" name="cvv" required />
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Podsumowanie</div>
                        <p>{{ Cart::content()->count() }} przedmioty</p>
                        @foreach(Cart::content() as $cartProduct)
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="img-fluid"
                                    src="{{ asset($cartProduct->options->img) }}"></div>
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
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Złóż zamówienie
                        </button>



                        <p class="text-muted text-center">Zwroty nie są przyjmowane</p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div> </div>
    </div>



    @endsection