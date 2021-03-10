@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Kategorie')
@section('content')

<div class="container ">
<div class="col-lg-12">
    
<div class="w3l_banner_nav_right col-lg-12">
    <!-- about -->
    <div class="privacy about">
        <h3>Koszyk z zakupami</h3>
        @if(Cart::count() != "0")
        <div class="checkout-right">
            <h4>W twoim koszyku aktualnie jest : <span>{{ Cart::count() }} produktów</span></h4>
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
        <div class="alert alert-success" id="CartMsg"></div>
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
    </div>


        </div>
    </div>

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