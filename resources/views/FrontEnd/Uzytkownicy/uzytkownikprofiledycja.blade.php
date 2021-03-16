@extends('FrontEnd.FrontEndSzablon2')

@section('title', 'Użytkownik')
@section('content')

<div class="container ">
<div class="col-lg-10">
<div class="w3l_banner_nav_right" style="background-color:white;">
    <!-- login -->
    <div class="w3_login ">
        
      
        <h3>Edycja Profilu</h3><br><br>
        <div class="w3_login_module paneluzytkownika">
        <form id="uzytkownik-form" method="post" 
                action="{{ url('/uzytkownik/update-profile') }}">
                    @if(isset($edit) && $edit === true)
                         @method('PATCH')
                            @endif
                             @csrf
            <div class="form-group">
                                <label>Imie</label>
                                <input type="hidden" name="userId" value="{{ $uzytkownik->id }}" class="form-control">
                                <input type="text" name="name" value="{{ $uzytkownik->name }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Nazwisko</label>
                                <input type="text" name="surname" value="{{ $uzytkownik->surname }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('surname') ? $errors->first('surname') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" name="phone" value="{{ $uzytkownik->phone }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $uzytkownik->email }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="adress" value="{{ $uzytkownik->adress }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('adress') ? $errors->first('adress') : '' }}
                                </span>
                            </div>

            <input type="submit" name="c_btn" value="Zaaktualizuj" class="btn btn-success">
</form>
        </div>
    </div>
    <!-- //login -->




</div>

</div>
</div>
<div class="clearfix"></div>
@endsection
