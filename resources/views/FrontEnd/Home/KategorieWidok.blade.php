@extends('FrontEnd.FrontEndSzablon2')

@section('title', 'Sklep')
@section('content')
<header class="border-bottom mb-4 pb-3">
    <div class="form-inline">
        <h2>{{$kategoria1->Nazwa}}</h2>

    </div>
</header><!-- sect-heading -->

@foreach($produkty as $product)
<article class="card card-product-list">
    <div class="row no-gutters">
        <aside class="col-md-3">
            <a href="{{ route('index.show',$product->id)}}" class="img-wrap">

                <img src="{{ asset($product->Zdjecie) }}">
            </a>
        </aside> <!-- col.// -->
        <div class="col-md-6">
            <div class="info-main">
                <a href="{{ route('index.show',$product->id)}}" class="h5 title"> {{ $product->Nazwa }} </a>
                <div class="rating-wrap mb-3">
                    <ul class="rating-stars">
                        <li style="width:80%" class="stars-active">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                        <li>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                    </ul>
                    <div class="label-rating">7/10</div>
                </div> <!-- rating-wrap.// -->

                <p> {{ $product->Opis }} </p>
            </div> <!-- info-main.// -->
        </div> <!-- col.// -->
        <aside class="col-sm-3">
            <div class="info-aside">
                <div class="price-wrap">
                    <span class="price h5"> {{ $product->Cena }}zł / {{$product->JednostkaMiary}} </span>
                    <del class="price-old"> {{ $product->Cena+1 }}zł / {{$product->JednostkaMiary}}</del>
                </div> <!-- info-price-detail // -->
                <p class="text-success">Odbiór na rynku</p>
                <br>
                <p>
                    <a href="{{ route('index.show',$product->id)}}" class="btn btn-success btn-block"> Szczegóły </a>
                    <a href="{{ url('cart/add/'.$product->id) }}"
                        onclick="alert('Dodano {{ $product->Nazwa }} do koszyka ')" class="btn btn-primary btn-block"><i
                            class="fa fa-shopping-cart"></i>
                        <span class="text">Dodaj do koszyka</span>
                    </a>
                </p>
            </div> <!-- info-aside.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->

</article> <!-- card-product .// -->
@endforeach



{{ $produkty->links() }}



@endsection