@extends('FrontEnd.FrontEndSzablon3')

@section('css-styles')
<link href="{{ asset('css/koszyk.css') }}" rel="stylesheet">
@endsection

@section('title', 'Koszyk')
@section('content')

<!-- <div class="container">
<div class="col-lg-12" > -->
    
<!-- <div class="w3l_banner_nav_right col-lg-12">
    <div class="privacy about">
        <h3>Koszyk z zakupami</h3>
        @if(Cart::count() != "0")
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Nr.</th>	
                        <th>Produkt</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        
                        <th>Usuń</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach(Cart::content() as $cartProduct)
                    <tr class="rem1">
                        <td class="invert">{{ $i++ }}</td>
                        <td><a href="single.html"><img src="{{ asset($cartProduct->options->img) }}" alt=" "  width="100px" height="100px" class="img-responsive"></a></td>
                        <td class="invert">{{ $cartProduct->name.' '.$cartProduct->options->pdQty.' '.$cartProduct->options->perimeter }}</td>
                        <td class="invert">{{ $cartProduct->price.' zł' }}</td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">                           

                                    <input type="hidden"  id="rowId{{$cartProduct->id}}" value="{{$cartProduct->rowId}}">
                                    <input type="number" id="upCart{{$cartProduct->id}}" value="{{$cartProduct->qty}}" max="10" min="1" class="entry value">

                                </div>
                            </div>
                        </td>
                       
                        <td class="invert">
                            <div class="rem">
                                <a class="close1" href="{{ url('/cart/remove/'.$cartProduct->rowId) }}"><i class="fas fa-trash-alt"></i> </a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="checkout-left">	
            <div class="col-md-4 checkout-left-basket">
                <h4>Łączna kwota</h4>
                <ul>
                    <?php
                             $subtotal = str_replace(",", "", Cart::subtotal());
                             $total = $subtotal;
                         ?>
                    <li>Razem <i>-</i> <span>{{ $subtotal.' zł.' }} </span></li>
                   
                    <li>Do zapłaty <i>-</i> <span>{{ $total.' zł.' }}</span></li>
                </ul>
            </div>
            <div class="col-md-4 address_form_agile">
                <div class="checkout-right-basket">
                    <a href="{{ url('/checkout') }}">Zamawiam <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>
            <div class="col-md-4 address_form_agile">
                <div class="checkout-right-basket">
                    <a href="{{ route('index.index') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Kontynuuj zakupy</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        @else
        <h1>Koszyk jest pusty!</h1>
        @endif
    </div> -->


<!-- 
    <div class="basket" class="p-2" >
    
      <div class="basket-labels" >
        <ul>
          <li class="item item-heading">Produkt</li>
          <li class="price">Cena</li>
          <li class="quantity">Ilość</li>
          <li class="subtotal">Koszt</li>
        </ul>
      </div>
      @foreach(Cart::content() as $cartProduct)
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="{{ asset($cartProduct->options->img) }}" alt="$cartProduct->name" class="product-frame">
          </div>
          <div class="product-details">
            <h6><strong>{{$cartProduct->name}}</h6>
         
          </div>
        </div>
        <div class="price">{{$cartProduct->price}} zł</div>
        <div class="quantity">
        <input type="hidden"  id="rowId{{$cartProduct->id}}" value="{{$cartProduct->rowId}}">
                                    <input type="number" id="upCart{{$cartProduct->id}}" value="{{$cartProduct->qty}}" max="100" min="1" class="entry value">
        </div>
        <?php
                             $subtotal = str_replace(",", "", $cartProduct->qty*$cartProduct->price);
                             $total = $subtotal;
                         ?>
        <div class="subtotal">{{$subtotal}} zł</div>
        <div class="remove">
          <button><a  href="{{ url('/cart/remove/'.$cartProduct->rowId) }}"><i class="fas fa-trash-alt"></i> </a></button>
        </div>
      </div>
      @endforeach
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Produkty w twoim koszyku</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Razem</div>
          <div class="subtotal-value final-value" id="basket-subtotal">{{Cart::subtotal()}} zł</div>
        
        </div>
      
        <div class="summary-total">
        
        <div class="summary-checkout">
        <a href="{{ url('/checkout') }}">  <button class="checkout-cta">Zamawiam</button></a>
        </div>
      </div>
    </aside>




        </div>
        <br>
    </div> -->



    
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Koszyk z zakupami</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container col-md-9">

<div class="row">
	<main class="col-md-9">
<div class="card">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Produkt</th>
  <th scope="col" >Ilosc</th>
  <th scope="col">Cena</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>
<tr>
@foreach(Cart::content() as $cartProduct)
	<td>
   
		<figure class="itemside">
			<div class="aside"><img src="{{ asset($cartProduct->options->img) }}" class="img-sm"></div>
			<figcaption class="info">
			<h5>{{$cartProduct->name}}<h5>
			</figcaption>
		</figure>
	</td>
	<td> 
    <input type="hidden"  id="rowId{{$cartProduct->id}}" value="{{$cartProduct->rowId}}">
                                    <input type="number" id="upCart{{$cartProduct->id}}" value="{{$cartProduct->qty}}" max="100" min="1" class="entry value">
        </div>
        <?php
                             $subtotal = str_replace(",", "", $cartProduct->qty*$cartProduct->price);
                             $total = $subtotal;
                         ?>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">{{$cartProduct->price}} zł</var> 
		
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="{{ url('/cart/remove/'.$cartProduct->rowId) }}" class="btn btn-light"> Usuń</a>
	</td>
</tr>
@endforeach
</tbody>
</table>

<div class="card-body border-top">
	<a href="{{ url('/checkout') }}" class="btn btn-primary float-md-right"> Zamawiam<i class="fa fa-chevron-right"></i> </a>
	<a href="{{ route('index.index') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Kontynuuj zakupy </a>
</div>	
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
	<p class="icontext"><i class="icon text-success fa fa-truck"></i> Odbiór na rynku lub płatność online</p>
</div>

	</main> <!-- col.// -->

		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Cena łączna:</dt>
					  <dd class="text-right">{{Cart::subtotal()}} zł</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Zniżka:</dt>
					  <dd class="text-right">----</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Razem:</dt>
					  <dd class="text-right  h5"><strong>{{Cart::subtotal()}} zł</strong></dd>
					</dl>
					<hr>
				
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y">
<div class="container">
<h6>Zwrot i refundacja kosztów</h6>
<p>Proszę upenić się że produkty w koszyku są poprawne. Gospodarstwo nie przyjmuje reklamacji ani
nie zwraca pieniędzy.</p>

</div><!-- container // -->
</section>

@endsection

@section('js-scripts')
<script>
    $(document).ready(function(){
        $("#CartMsg").hide();
        @foreach(Cart::content() as $cartProduct)
        $("#upCart{{$cartProduct->id}}").on('change keyup', function(){
            var newQty = $("#upCart{{$cartProduct->id}}").val();
            var rowId = $("#rowId{{$cartProduct->id}}").val();
            $.ajax({
                url:'{{url('/cart/update')}}',
                data:'rowId=' + rowId + '&newQty=' + newQty,
                type:'get',
                success:function(response){
                    window.location.reload(true);
                }
            });
        });
        @endforeach
    });
   
</script>




@endsection