@extends('layouts.app')

@section('title', 'Gospodarstwo')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edycja Danych Gospodarstwa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['route'=>['update', $gospodarstwo->id], 'method'=>'POST', 'enctype'=>'multipart/form-data',
    'name'=>'editGospodarstwoForm', 'role'=>'form','id' =>'Gospodarstwo-form']) !!}
    <div class="card-body">
        <div class="form-group">
            <label>Imie</label>
            <input type="hidden" name="id" value="{{ $gospodarstwo->id }}">
            <input type="text" name="Imie_Wlasciciel" value="{{ $gospodarstwo->Imie_Wlasciciel }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Nazwisko</label>
            <input type="text" name="Nazwisko_Wlasciciel" value="{{ $gospodarstwo->Nazwisko_Wlasciciel }}"
                class="form-control">
        </div>

        <div class="form-group">
            <label>Miejscowosc</label>
            <input type="text" name="Miejscowosc" value="{{ $gospodarstwo->Miejscowosc }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Kod Pocztowy</label>
            <input type="text" name="Kod_Pocztowy" value="{{ $gospodarstwo->Kod_Pocztowy }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Poczta Miejscowosc</label>
            <input type="text" name="Poczta_Miejscowosc" value="{{ $gospodarstwo->Poczta_Miejscowosc }}"
                class="form-control">
        </div>

        <div class="form-group">
            <label>Telefon</label>
            <input type="text" name="Telefon" value="{{ $gospodarstwo->Telefon }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="Email" value="{{ $gospodarstwo->Email }}" class="form-control">
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" name="btn" class="btn btn-primary przyciskwyslij">Zaaktualizuj</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Gospodarstwo\UpdateGospodarstwoRequest', '#Gospodarstwo-form'); !!}



@endsection