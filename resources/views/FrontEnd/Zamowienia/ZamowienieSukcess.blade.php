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
    <h1 class="text-center">Podsumowanie zamówienia</h1>
    <div class="card col-md-8" style="margin-left:15%;">
        <h5 class="card-header bg-success">{{ Cart::content()->count() }} przedmioty</h5>
        <div class="card-body">
            @foreach(Cart::content() as $cartProduct)
            <div class="row item">
                <div class="col-4 align-self-center"><img class="img-fluid"
                        src="{{ asset($cartProduct->options->img) }}" style="width:50%;height:50%;"></div>
                <div class="col-8">

                    <div class="row"><b> {{$cartProduct->name}}</b></div>
                    <div class="row"><b>{{$cartProduct->price}} zł</b></div>
                    <div class="row">Sztuk {{$cartProduct->qty}}</div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
        <hr>
        <div class="row lower bg-light">
            <div class="col text-left">Cena całkowita</div>
            <div class="col text-right">{{Cart::subtotal()}} zł</div>
        </div>
        <div class="row lower bg-light">
            <div class="col text-left">Dostawa</div>
            <div class="col text-right">Odbiór na rynku</div>
        </div>
        <div class="row lower bg-light">
            <div class="col text-left"><b>Do zapłaty</b></div>
            <div class="col text-right"><b>{{Cart::subtotal()}} zł</b></div>
        </div>

    </div>
</div>
</div>




<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dziękujemy za zakup naszego produktu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Dziękujemy za zakup naszego towaru. Twoje zamówienie zostanie niezwłocznie przygotowane.
                Zapraszamy do dalszych zakupów.
            </div>
            <div class="modal-footer">

                <a href="{{ url('/home') }}" class="btn btn-primary float-md-right"> Wróć do strony głównej </a>
            </div>
        </div>
    </div>
</div>
<br>

<?php
                    Cart::destroy();
//                    session()->forget('shippingId');
               ?>

@endsection

@section('js-scripts')
<script type="text/javascript">
$(window).on('load', function() {
    $('#myModal').modal('show');
});
</script>
@endsection