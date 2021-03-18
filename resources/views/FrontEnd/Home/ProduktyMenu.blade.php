@extends('FrontEnd.FrontEndSzablon4')

@section('title', 'Sklep')
@section('content')

<div class="container p-2">
<div class="col-lg-12 ">
    
 <h3 class="py-1">Nasze Produkty</h3>

<div class="col-md-12 ">
        <div class="row">
            @foreach($produkty as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                   <img src="{{ asset($product->Zdjecie) }}"
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
