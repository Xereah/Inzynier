@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Płatność')
@section('content')
<div class="w3l_banner_nav_right" style="background-color:white;">
    
<section class="section-pagetop bg">
<div class="container">
<ul class="progress-indicator">
            <li class="completed">
                <span class="bubble"></span>
                Koszyk. <br>
            </li>
            <li class="completed">
                <span class="bubble"></span>
                Dane klienta. <br>
            </li>
            <li class="active">
                <span class="bubble"></span>
                Wybór płatności. <br>
            </li>
            <li>
                <span class="bubble"></span>
                Podsumowanie
            </li>
           
        </ul>
</div> <!-- container //  -->
</section>


    <br><br>
    <div class="container ">
        <div class="row p-4 card mx-auto " style="max-width: 500px; margin-top:150px;margin:15px;">
            <div class="col-lg-12 text-center ">
                <div class="well lead text-center text-success "><strong>Wybierz metedę płatności</strong></div>
            </div>
            <div class="col-lg-12">
                <div class="w3_login ">
                    <h3>Metody płatności</h3>   
                </div>
            </div>
            <div class="col-lg-10 py-2 platnosc">
              {!! Form::open(['url'=>'/order/save-order', 'method'=>'POST']) !!}
              @foreach($platnosc as $platnosci)
              <div class="form-group ">
                <label><input type="radio" name="platnosc" value="{{$platnosci->id}}"> {{$platnosci->platnosc}}</label>
              </div>
              
              @endforeach
              <button type="submit" name="btn" class="btn btn-success">Zapisz</button>
              {!! Form::close() !!}
            </div>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection