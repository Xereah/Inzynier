@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Sklep')
@section('content')

<div class="container ">
    <div class="col-lg-12">

        <!--Section: Block Content-->
        <section class="mb-5 py-5">

            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">

                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox">

                        <div class="row product-gallery mx-1">

                            <div class="col-12 mb-0">
                                <figure class="view overlay rounded z-depth-1 main-img">
                                    <img style="width:100%;height:100%;" src="{{ asset($produkty->Zdjecie) }}">
                                    </a>
                            </div>
                            <div class="col-12">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6">

                    <h5>{{$produkty->Nazwa}}</h5>
                    <p class="mb-2 text-muted text-uppercase small">{{ $produkty->kategoria->Nazwa }}</p>
                    <div class="rating">
                        <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                        <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                        <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                        <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                        <label for="stars-rating-1"><i class="fa fa-star text-primary"></i></label>
                    </div>
                    <p><span class="mr-1"><strong>{{ $produkty->Cena }}zł /
                                {{$produkty->JednostkaMiary}}</strong></span></p>
                    <p class="pt-1">{{ $produkty->Opis }}</p>
                    <hr>
                    <div class="table-responsive mb-2">
                        @if($produkty->Ilosc ==0)
                        <h5>Niestety nie mamy już tego produktu na stanie<h5>
                                <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Kiedy dostępny?
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Powiadom mnie o
                                                    dostępności</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row p-2 bg-white ">
                                                    <div class="col-md-5 mt-1"><img
                                                            class="img-fluid img-responsive rounded product-image"
                                                            src="{{ asset($produkty->Zdjecie) }}"></div>
                                                    <div class="col-md-6 mt-1">
                                                        <h5>{{ $produkty->Nazwa }}</h5>
                                                        {{ $produkty->Opis }}
                                                        <br>
                                                        <br>
                                                    </div>


                                                    <div class="input-group">

                                                        <input type="text" class="form-control"
                                                            placeholder="Wpisz adres email">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" type="button">
                                                                <i class="fas fa-envelope"></i>
                                                            </button>

                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted">Na podany
                                                            email zostanie wysłana wiadmość gdy produkt będzie
                                                            dostępny.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <h5>Dostępna ilość: {{$produkty->Ilosc}}{{$produkty->JednostkaMiary}}</h5>
                                            @endif
                                        </div>


                                        @if($produkty->Ilosc !=0)
                                        <p class="btn-holder"><a href="{{ url('cart/add/'.$produkty->id) }}"
                                                class="btn btn-primary btn-md mr-1 mb-2">
                                                <i class="fas fa-shopping-cart pr-2"></i> Dodaj do koszyka</a> </p>

                                        @endif
                                    </div>
                                </div>

        </section>
        <!--Section: Block Content-->



    </div>
</div>

@endsection