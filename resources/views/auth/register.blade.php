@extends('layouts.auth')

@section('title', 'Rejestracja')

@section('content')
<div class="col-lg-2 col-4 p-3" >
	<a href="{{ route('index.index') }}"><img src="{{url('/Zdjecie/logotransparent.png')}}"></a>
	</div>
  <hr>
<div class="card o-hidden border-0 shadow-lg my-5">
  
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Utwórz konto!</h1>
            </div>
            <form method="POST" id="Uzytkownicy-form" action="{{ route('uzytkownik.storeguest') }}" class="user">
              @csrf

              <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Imie">
              
                  @error('name')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required placeholder="Nazwisko">
              
                  @error('surname')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Telefon">
              
                  @error('surname')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required placeholder="Adress">
              
                  @error('adress')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email">
                
                @error('email')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required placeholder="Hasło">

                  @error('password')
                    <span class="invalid-feedback ml-2 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" name="password_confirmation" required placeholder="Potwierdź hasło">
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-user btn-block">
                Utwórz konto
              </button>

            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">Masz już konto? Zaloguj się!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Uzytkownicy\UpdateUzytkownicyRequest', '#Uzytkownicy-form'); !!}



@endsection