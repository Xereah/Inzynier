@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Kategorie')
@section('content')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="well lead text-center text-success">Wybierz metedę płatności</div>
            </div>
            <div class="col-lg-10">
                <div class="w3_login">
                    <h3>Metody płatności</h3>   
                </div>
            </div>
            <div class="col-lg-10">
              {!! Form::open(['url'=>'/order/save-order', 'method'=>'POST']) !!}
              @foreach($platnosc as $platnosci)
              <div class="form-group">
                <label><input type="radio" name="platnosc" value="{{$platnosci->id}}">{{$platnosci->platnosc}}</label>
              </div>
              
              @endforeach
              <button type="submit" name="btn" class="btn btn-success">Submit</button>
              {!! Form::close() !!}
            </div>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection