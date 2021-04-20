@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Sklep')
@section('content')

<!-- <div class="container ">
<div class="col-lg-12"> -->

<!-- <div class="baner more">
<h3>Codziennie <span>świeże</span> <br>produkty</h3>
<a href="{{url('produkty/menu')}}" class="button--saqui button--round-l button--text-thick" data-text="Kup Teraz!">Kup Teraz!</a>
</div> -->
<!-- 
<h3 class="py-5">Dziś w ofercie mamy</h3>
<div class="col-md-12 ">
        <div class="row">
            @foreach($produkty->take(6) as $product)
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
                            @else
                            <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal" data-target="#exampleModal">
                                Kiedy dostępny?
                            </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                         <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Powiadom mnie o dostępności</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                           </div>
                          <div class="modal-body">
                          <div class="row p-2 bg-white ">
                          <div class="col-md-5 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset($product->Zdjecie) }}"></div>
                          <div class="col-md-6 mt-1">
                              <h5>{{ $product->Nazwa }}</h5>
                              {{ $product->Opis }}
                              <br>
                              <br>
                          </div> 
                          
                        
                            <div class="input-group">
                            
                                <input type="text" class="form-control" placeholder="Wpisz adres email">
                                <div class="input-group-append">
                                     <button class="btn btn-secondary" type="button">
                                     <i class="fas fa-envelope"></i>
                                     </button>
                                    
                                 </div>
                                 <small id="emailHelp" class="form-text text-muted">Na podany email zostanie wysłana wiadmość gdy produkt będzie dostępny.</small>
                             </div>
                          </div> 
                     </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    </div>
                     </div>
                    </div>
                </div>

                                @endif
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>
    </div>


-->


<section class="section-name padding-y-sm">
    <div class="container">

        <header class="section-heading">
            <a href="{{url('produkty/menu')}}" class="btn btn-outline-primary float-right">Zobacz wszystkie</a>
            <h3 class="section-title">Popularne produkty</h3>
        </header><!-- sect-heading -->


        <div class="row">
            @foreach($produkty->take(8) as $product)

            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="{{ route('index.show',$product->id)}}" class="img-wrap"> <img
                            src="{{ $product->Zdjecie }}"> </a>
                    <figcaption class="info-wrap">
                        <a href="{{ route('index.show',$product->id)}}" class="title">
                            <h5>{{ $product->Nazwa }}</h5>
                        </a>
                        <div class="price mt-1">Cena: {{ $product->Cena }}zł/{{$product->JednostkaMiary}}</div> <!-- price-wrap.// -->

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