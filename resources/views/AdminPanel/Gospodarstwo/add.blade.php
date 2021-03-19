@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dodawanie Danych Gospodarstwa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
          
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    {!! Form::open(['url'=>'gospodarstwo/store', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form','id' =>'Gospodarstwo-form']) !!}
                        <div class="form-group">
                            <label>Imie</label>
                            <input type="hidden" name="id">
                            <input type="text" name="Imie_Wlasciciel" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Imie_Wlasciciel') ? $errors->first('Imie_Wlasciciel') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Nazwisko</label>
                            <textarea class="form-control" rows="1" name="Nazwisko_Wlasciciel"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Nazwisko_Wlasciciel') ? $errors->first('Nazwisko_Wlasciciel') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Miejscowość</label>
                            <textarea class="form-control" rows="1" name="Miejscowosc"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Miejscowosc') ? $errors->first('Miejscowosc') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Kod Pocztowy</label>
                            <textarea class="form-control" rows="1" name="Kod_Pocztowy"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Kod_Pocztowy') ? $errors->first('Kod_Pocztowy') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Poczta Miejscowosc</label>
                            <textarea class="form-control" rows="1" name="Poczta_Miejscowosc"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Poczta_Miejscowosc') ? $errors->first('Poczta_Miejscowosc') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Telefon</label>
                            <textarea class="form-control" rows="1" name="Telefon"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Telefon') ? $errors->first('Telefon') : '' }}
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <textarea class="form-control" rows="1" name="Email"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Email') ? $errors->first('Email') : '' }}
                            </span>
                        </div>
                     
                        <button type="submit" name="btn" class="btn btn-success przyciskwyslij float-right">Dodaj Gospodarstwo do Bazy</button>
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

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Gospodarstwo\StoreGospodarstwoRequest', '#Gospodarstwo-form'); !!}



@endsection