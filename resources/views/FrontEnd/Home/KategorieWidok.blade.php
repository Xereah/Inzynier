@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Sklep')
@section('content')


    <div class="d-flex justify-content-center row">
    <h3 class="">Aktualnie na stanie mamy</h3>
            @foreach($produkty as $product)
        <div class="col-md-12">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset($product->Zdjecie) }}"></div>
                <div class="col-md-6 mt-1">
                    <h5>{{ $product->Nazwa }}</h5>
                    <div class="d-flex flex-row">
                    </div>
                    {{ $product->Opis }}
                    <hr>
                   <strong> <p>Pozostało na stanie {{ $product->Ilosc }}{{ $product->JednostkaMiary }}</p></strong>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">{{ $product->Cena }} zł</h4>
                    </div>
                    <h6 class="text-success">Odbiór na rynku</h6>
                    <div class="d-flex flex-column mt-4">
                    <a href="{{ route('index.show',$product->id)}}"
                                class="btn btn-primary btn-sm" role="button">Szczegóły</a>
                                @if($product->Ilosc !=0)
                    <a href="{{ url('cart/add/'.$product->id) }}"
                                class="btn btn-warning btn-block text-center" role="button">Dodaj do koszyka</a></div>
                                @endif
                </div>
                
            </div>
           
            </div>
            @endforeach
    </div>

@endsection
