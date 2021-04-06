@extends('FrontEnd.FrontEndSzablon2')

@section('title', 'Sklep')
@section('content')


   
   
    
    <!-- <h2>{{$kategoria1->Nazwa}}</h2>
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
           
    
            @endforeach -->


            <header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
		<h2>{{$kategoria1->Nazwa}}</h2>
			<!-- <span class="mr-md-auto"> </span>
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select> -->
		</div>
</header><!-- sect-heading -->

@foreach($produkty as $product)
<article class="card card-product-list">
	<div class="row no-gutters">
		<aside class="col-md-3">
			<a href="#" class="img-wrap">
			
				<img src="{{ asset($product->Zdjecie) }}">
			</a>
		</aside> <!-- col.// -->
		<div class="col-md-6">
			<div class="info-main">
				<a href="#" class="h5 title"> {{ $product->Nazwa }}  </a>
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
					<span class="price h5"> {{ $product->Cena }} zł </span>	
					<del class="price-old"> {{ $product->Cena-1 }}  zł</del>
				</div> <!-- info-price-detail // -->
				<p class="text-success">Odbiór na rynku</p>
				<br>
				<p>
					<a href="{{ route('index.show',$product->id)}}" class="btn btn-success btn-block"> Szczegóły </a>
					<a href="{{ url('cart/add/'.$product->id) }}" class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"></i> 
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
