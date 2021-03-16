@extends('FrontEnd.FrontEndSzablon4')

@section('title', 'Płatność')
@section('content')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
    <div class="container sukces">
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="well lead text-center"><h2><b><strong>Dziękujemy <br></b>Udało ci się złożyć zamówienie</strong></h2></div>
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