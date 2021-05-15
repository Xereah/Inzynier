@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dodawanie danych kategorii</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['url'=>'kategorie/store', 'method'=>'POST', 'enctype'=>'multipart/form-data',
    'name'=>'editProductForm', 'role'=>'form','id' =>'kategorie-form']) !!}
    <div class="card-body">
        <div class="form-group">
            <label>Nazwa</label>
            <input type="hidden" name="id">
            <input type="text" name="Nazwa" class="form-control">
        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" rows="3" name="Opis"></textarea>
        </div>

        <div class="card-footer">
            <button type="submit" name="btn" class="btn btn-primary przyciskwyslij float-right">Dodaj</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection


@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Kategorie\StoreKategorieRequest', '#kategorie-form'); !!}



@endsection