@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Płatność')
@section('content')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
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
            <li>
                <span class="active"></span>
                <span class="bubble"></span>
                Podsumowanie
            </li>
           
        </ul>
</div> <!-- container //  -->
</section>
    <div class="container sukces">
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="well lead text-center"><h2><b><strong>Dziękujemy <br></b>Udało ci się złożyć zamówienie</strong></h2></div>
            </div>
            <div class="col-md-5" style="margin-left:30%;">
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
                        <div class="col text-right">Odbiór na rynku</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Do zapłaty</b></div>
                        <div class="col text-right"><b>{{Cart::subtotal()}} zł</b></div>
                    </div>
                  
            </div>
        </div>
            <?php
                    Cart::destroy();
//                    session()->forget('shippingId');
               ?>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection