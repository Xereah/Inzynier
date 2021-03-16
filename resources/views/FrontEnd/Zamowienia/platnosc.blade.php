@extends('FrontEnd.FrontEndSzablon4')

@section('title', 'Płatność')
@section('content')
<div class="w3l_banner_nav_right" style="background-color:white;">
    <!-- login -->
    <br><br>
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-12">
                <div class="well lead text-center text-success"><strong>Wybierz metedę płatności</strong></div>
            </div>
            <div class="col-lg-12">
                <div class="w3_login">
                    <h3>Metody płatności</h3>   
                </div>
            </div>
            <div class="col-lg-10 py-2 platnosc">
              {!! Form::open(['url'=>'/order/save-order', 'method'=>'POST']) !!}
              @foreach($platnosc as $platnosci)
              <div class="form-group ">
                <label><input type="radio" name="platnosc" value="{{$platnosci->id}}">{{$platnosci->platnosc}}</label>
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