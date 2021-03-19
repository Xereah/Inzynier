@extends('layouts.app')

@section('title', 'Gospodarstwo')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edycja Danych Gospodarstwa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Aktualizacja Danych Gospodarstwa
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route'=>['update', $gospodarstwo->id], 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editGospodarstwoForm', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Imie</label>
                            <input type="hidden" name="id" value="{{ $gospodarstwo->id }}">
                            <input type="text" name="Imie_Wlasciciel" value="{{ $gospodarstwo->Imie_Wlasciciel }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Imie_Wlasciciel') ? $errors->first('Imie_Wlasciciel') : '' }}
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Nazwisko</label>
                            <input type="text" name="Nazwisko_Wlasciciel" value="{{ $gospodarstwo->Nazwisko_Wlasciciel }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Nazwisko_Wlasciciel') ? $errors->first('Nazwisko_Wlasciciel') : '' }}
                            </span>
                        </div>  

                        <div class="form-group">
                            <label>Miejscowosc</label>
                            <input type="text" name="Miejscowosc" value="{{ $gospodarstwo->Miejscowosc }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Miejscowosc') ? $errors->first('Miejscowosc') : '' }}
                            </span>
                        </div>  

                        <div class="form-group">
                            <label>Kod Pocztowy</label>
                            <input type="text" name="Kod_Pocztowy" value="{{ $gospodarstwo->Kod_Pocztowy }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Kod_Pocztowy') ? $errors->first('Kod_Pocztowy') : '' }}
                            </span>
                        </div>  

                        <div class="form-group">
                            <label>Poczta Miejscowosc</label>
                            <input type="text" name="Poczta_Miejscowosc" value="{{ $gospodarstwo->Poczta_Miejscowosc }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Poczta_Miejscowosc') ? $errors->first('Poczta_Miejscowosc') : '' }}
                            </span>
                        </div>  

                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" name="Telefon" value="{{ $gospodarstwo->Telefon }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Telefon') ? $errors->first('Telefon') : '' }}
                            </span>
                        </div>  

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="Email" value="{{ $gospodarstwo->Email }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Email') ? $errors->first('Email') : '' }}
                            </span>
                        </div>  
                        <button type="submit" name="btn" class="btn btn-success przyciskwyslij">Zaaktualizuj</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection