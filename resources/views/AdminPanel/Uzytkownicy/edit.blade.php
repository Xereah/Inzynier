@extends('layouts.app')

@section('title', 'Uzytkownicy')
@section('content')
<div class="alert alert-warning" role="alert">
    Uwaga! przy każdej edycji wymagana jest zmiana hasła.
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edycja danych użytkownika</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="Uzytkownicy-form" method="post" action="{{ route('uzytkownik.update', $uzytkownik->id) }}">
        @if(isset($edit) && $edit === true)
        @method('PATCH')
        @endif
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Imie</label>
                <input type="hidden" name="userId" value="{{ $uzytkownik->id }}" class="form-control">
                <input type="text" name="name" value="{{ $uzytkownik->name }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Nazwisko</label>
                <input type="text" name="surname" value="{{ $uzytkownik->surname }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Telefon</label>
                <input type="text" name="phone" value="{{ $uzytkownik->phone }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $uzytkownik->email }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Hasło</label>
                <input type="password" name="password" value="{{ $uzytkownik->password }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Rola</label>
                <select name="level" class="form-control">
                    <option value="{{ $uzytkownik->level }}">
                        {{ $uzytkownik->level == 1 ? 'Administrator':'Uzytkownik' }}</option>
                    <option value="1">Administrator</option>
                    <option value="2">Użytkownik</option>
                </select>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="adress" value="{{ $uzytkownik->adress }}" class="form-control">
            </div>
            <div class="card-footer">
                <button type="submit" name="btn" class="btn btn-primary float-right">Zaaktualizuj</button>
            </div>
    </form>

</div>
</div>
@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Uzytkownicy\UpdateUzytkownicyRequest', '#Uzytkownicy-form'); !!}



@endsection