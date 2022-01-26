@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Sklep')
@section('content')

<section class="section-name padding-y-sm">
    <div class="container">

        <header class="section-heading">
            <a href="{{url('produkty/menu')}}" class="btn btn-outline-primary float-right">Zobacz wszystkie</a>
            <h3 class="section-title">Popularne produkty</h3>
        </header><!-- sect-heading -->


        <div class="row">
            @foreach($produkty->take(8) as $product)

            <div class="col-md-3">
                <div href="#" class="card card-product-grid powiekszenie">
                    <a href="{{ route('index.show',$product->id)}}" class="img-wrap"> <img
                            src="{{ $product->Zdjecie }}"> </a>
                    <figcaption class="info-wrap">
                        <a href="{{ route('index.show',$product->id)}}" class="title">
                            <h5>{{ $product->Nazwa }}</h5>
                        </a>
                        <div class="price mt-1">Cena: {{ $product->Cena }}zł/{{$product->JednostkaMiary}}</div>
                        <!-- price-wrap.// -->

                    </figcaption>
                </div>

            </div> <!-- col.// -->

            @endforeach
        </div>

    </div> <!-- col.// -->

    </div> <!-- row.// -->

    </div><!-- container // -->
</section>




@endsection