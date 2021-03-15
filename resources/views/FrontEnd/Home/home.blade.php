@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Sklep')
@section('content')

<div class="container ">
<div class="col-lg-12">
    
<div class="baner more">
<h3>Codziennie <span>świeże</span> <br>produkty</h3>
<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Kup Teraz!">Kup Teraz!</a>
</div>

<h3 class="py-5">Dziś w ofercie mamy</h3>
<div class="col-md-12 ">
        <div class="row">
            @foreach($produkty as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                   <img src="{{ $product->Zdjecie }}"
                            class="card-img-top w-100" height="200px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Nazwa }}</h5>

                        <div class="row ">
                            <div class="col-md-12">
                            <h4>Cena: {{ $product->Cena }}zł</h4> 
                            </div>
                            <div class="col-md-12">

                                


                            </div>

                        </div>
                        <p class="btn-holder "><a href="{{ route('index.show',$product->id)}}"
                                class="btn btn-success btn-block text-center" role="button">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Szczegóły</a> </p>
                                @if($product->Ilosc !=0)
                        <p class="btn-holder"><a href="{{ url('cart/add/'.$product->id) }}"
                                class="btn btn-warning btn-block text-center" role="button">
                                <i class="fas fa-shopping-cart pr-2"></i> Dodaj do koszyka</a> </p>
                                @endif
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>
    </div>

@endsection


<!-- <div class="d-flex justify-content-center row">
            @foreach($produkty as $product)
        <div class="col-md-12">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ $product->Zdjecie }}"></div>
                <div class="col-md-6 mt-1">
                    <h5>{{ $product->Nazwa }}</h5>
                    <div class="d-flex flex-row">
                    </div>
                  
                    <hr>
                    <p>Pozostało na stanie {{ $product->Ilosc }}{{ $product->JednostkaMiary }}</p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">{{ $product->Cena }} zł</h4>
                    </div>
                    <h6 class="text-success">Odbiór na rynku</h6>
                    <div class="d-flex flex-column mt-4">
                    <a href="{{ route('index.show',$product->id)}}"
                                class="btn btn-primary btn-sm" role="button">Szczegóły</a>
                    <a href="{{ url('add-to-cart/'.$product->id) }}"
                                class="btn btn-warning btn-block text-center" role="button">Dodaj do koszyka</a></div>
                </div>
                
            </div>
           
            </div>
            @endforeach
    </div>
    



</div>
</div> -->


