@extends('FrontEnd.FrontEndSzablon2')

@section('title', 'Sklep')
@section('content')

<div class="container ">
<div class="col-lg-12">
    
<div class="col-md-12 ">
        <div class="row p-4">
        @if($produkty->count() > 0)
            @foreach($produkty as $product)
            <section class="mb-5">

  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
                <img style="width:100%;height:100%;" src="{{ asset($product->Zdjecie) }}"
                 >
              </a>
          </div>
          <div class="col-12">
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">

      <h5>{{$product->Nazwa}}</h5>
      <!--  -->
      <div class="rating">
								<label for="stars-rating-5"><i class="fa fa-star"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-primary"></i></label>
							</div>
      <p><span class="mr-1"><strong>{{ $product->Cena }}zł / {{$product->JednostkaMiary}}</strong></span></p>
      <p class="pt-1">{{ $product->Opis }}</p>
      <hr>
      <div class="table-responsive mb-2">
      <h5>Dostępna ilość: {{$product->Ilosc}}{{$product->JednostkaMiary}}</h5>
      </div>
     
      @if($product->Ilosc !=0)
        <p class="btn-holder"><a href="{{ url('cart/add/'.$product->id) }}"
        class="btn btn-primary btn-md mr-1 mb-2">
               <i class="fas fa-shopping-cart pr-2"></i> Dodaj do koszyka</a> </p>
               @endif
    </div>
  </div>

</section>
            @endforeach
            @else
            
            <h4><p class="nieznaleziono p-4">Nie znaleziono produktów spełniających twoje kryteria!</p></h4>
   
            @endif


</div>
</div>

@endsection
