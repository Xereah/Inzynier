@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dodawanie danych gospodarstwa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(['url'=>'gospodarstwo/store', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form','id' =>'Gospodarstwo-form']) !!}
                <div class="card-body">
                  <div class="form-group">
                  <label>Imie</label>
                            <input type="hidden" name="id">
                            <input type="text" name="Imie_Wlasciciel" class="form-control">
                  </div>

                  <div class="form-group">
                  <label>Nazwisko</label>
                            <textarea class="form-control" rows="1" name="Nazwisko_Wlasciciel"></textarea>
                  </div>

                  <div class="form-group">
                  <label>Miejscowość</label>
                            <textarea class="form-control" rows="1" name="Miejscowosc"></textarea>

                
                  <div class="form-group">
                  <label>Kod Pocztowy</label>
                            <textarea class="form-control" rows="1" name="Kod_Pocztowy"></textarea>
                  </div>

                  <div class="form-group">
                  <label>Poczta Miejscowosc</label>
                            <textarea class="form-control" rows="1" name="Poczta_Miejscowosc"></textarea>
                  </div>

                  <div class="form-group">
                  <label>Telefon</label>
                            <textarea class="form-control" rows="1" name="Telefon"></textarea>
                  </div>

                  <div class="form-group">
                  <label>Email</label>
                            <textarea class="form-control" rows="1" name="Email"></textarea>
                  </div>

                 
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="btn" class="btn btn-primary przyciskwyslij float-right">Dodaj</button>
                </div>
                {!! Form::close() !!}
            </div>

@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Gospodarstwo\StoreGospodarstwoRequest', '#Gospodarstwo-form'); !!}

@endsection