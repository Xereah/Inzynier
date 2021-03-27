@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Koszyk')
@section('content')
<div class="w3l_banner_nav_right">
    <!-- login -->
    <br><br>
    <div class="container" style="background-color:white;">
        <div class="row p-4 "> 
            <div class="col-lg-12">
                <div class="well lead text-center text-success"><strong>Witaj <b>{{ $uzytkownik->name }}</b>. Sprawdź swoje dane kontaktowe. Jeżeli wszystko się zgadza przejdź dalej.</strong></div>
            </div>
            <div class="col-lg-12">
                <div class="w3_login">
                    <h3>Dane wysyłki</h3>   
                </div>
            </div>
            <div class="col-lg-12 ">
              {!! Form::open(['url'=>'/checkout/save-shipping', 'method'=>'POST']) !!}
              <div class="form-group">
                                <label><strong>Imie</strong></label>
                                <input type="hidden" name="userId" value="{{ $uzytkownik->id }}" class="form-control">
                                <input type="text" name="name" value="{{ $uzytkownik->name }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label><strong>Nazwisko</strong></label>
                                <input type="text" name="surname" value="{{ $uzytkownik->surname }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('surname') ? $errors->first('surname') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label><strong>Telefon</strong></label>
                                <input type="text" name="phone" value="{{ $uzytkownik->phone }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label><strong>Email</strong></label>
                                <input type="email" name="email" value="{{ $uzytkownik->email }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label><strong>Address</strong></label>
                                <input type="text" name="adress" value="{{ $uzytkownik->adress }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('adress') ? $errors->first('adress') : '' }}
                                </span>
                            </div>
              <button type="submit" name="btn" class="btn btn-success float-right">Zapisz</button>
              {!! Form::close() !!}
            </div>
        </div><br>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
@endsection