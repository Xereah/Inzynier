@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Kategorie')
@section('content')

<div class="container ">
<div class="col-lg-12">
    
<!--Section: Block Content-->
<section class="mb-5" style="background-color:#f7f7f7">

  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
                <img src="{{ asset($produkty->Zdjecie) }}"
                 >
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
      <p><span class="mr-1"><strong>{{ $produkty->Cena }}zł / {{$produkty->JednostkaMiary}}</strong></span></p>
      <p class="pt-1">{{ $produkty->Opis }}</p>
      <hr>
      <div class="table-responsive mb-2">
      @if($produkty->Ilosc ==0)
      <h5>Niestety nie mamy już tego produktu na stanie<h5>
      @else
      <h5>Dostępna ilość: {{$produkty->Ilosc}}{{$produkty->JednostkaMiary}}</h5>
      @endif
      </div>
     
    
      @if($produkty->Ilosc !=0)
        <p class="btn-holder"><a href="{{ url('cart/add/'.$produkty->id) }}"
           class="btn btn-warning btn-block text-center" role="button">
               <i class="fas fa-shopping-cart pr-2"></i> Dodaj do koszyka</a> </p>
               @endif
    </div>
  </div>

</section>
<!--Section: Block Content-->



</div>
</div>

@endsection
