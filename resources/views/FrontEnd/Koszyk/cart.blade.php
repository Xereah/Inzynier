@extends('FrontEnd.FrontEndSzablon3')

@section('css-styles')
<link href="{{ asset('css/koszyk.css') }}" rel="stylesheet">
@endsection

@section('title', 'Koszyk')
@section('content')


    
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Koszyk z zakupami</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
@if(Cart::content()->count()==0)
<h1 class="display-4 text-center">Koszyk jest pusty</h1>
	@else
<section class="section-content padding-y" style="font-size:15px;">
<div class="container col-md-9">

<div class="row">
	<main class="col-md-9">
<div class="card">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase" style="color:black;font-size:15px;text-align:center;">
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
    
   
								<div class="quantity-input" style="margin-left:30%;">
                <a class="btn btn-primary"  href="{{ url('/cart/zmniejsz/'.$cartProduct->rowId) }}">-</a>
									<input type="text" disabled name="product-quatity" value="{{$cartProduct->qty}}" max="100" min="1" pattern="[0-9]*" style="font-size:12px;text-align:center;width:15%;">									
									<a class="btn btn-primary" href="{{ url('/cart/zwieksz/'.$cartProduct->rowId) }}">+</a>
									
								</div>
						
      
      
      
        </div>
        <?php
                             $subtotal = str_replace(",", "", $cartProduct->qty*$cartProduct->price);
                             $total = $subtotal;
                         ?>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price" style="width:30px;">{{$cartProduct->price}}zł</var> 
		
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
					<a href="{{ url('/checkout') }}" class="btn btn-primary float-md-right col-12"> Zamawiam<i class="fa fa-chevron-right"></i> </a>
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	


</div> <!-- container .//  -->
</section>
@endif
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