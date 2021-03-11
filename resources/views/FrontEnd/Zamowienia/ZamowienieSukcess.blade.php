@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Kategorie')
@section('content')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="well lead text-center text-success"><b>Dziękujemy</b>Udało ci się złożyć zamówienie</div>
            </div>
            <?php
                    Cart::destroy();
//                    session()->forget('shippingId');
               ?>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection