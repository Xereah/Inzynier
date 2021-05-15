@extends('layouts.app')

@section('title', 'Produkty')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dodawanie danych produktu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['url'=>'produkty/save', 'method'=>'POST', 'enctype'=>'multipart/form-data',
    'name'=>'editProductForm', 'role'=>'form','id' =>'produkty-form']) !!}
    <div class="card-body">
        <div class="form-group">
            <label>Nazwa</label>
            <input type="hidden" name="id">
            <input type="text" name="Nazwa" class="form-control">
        </div>
        <div class="form-group">
            <label>Cena</label>
            <input type="number" name="Cena" class="form-control">

        </div>
        <div class="form-group">
            <label>Ilosc</label>
            <input type="number" name="Ilosc" class="form-control">

        </div>
        <div class="form-group">
            <label>Jednostka Miary</label>
            <select name="JednostkaMiary" class="form-control">
                <option value="kg">kg</option>
                <option value="sztuki">sztuki</option>
            </select>

        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" rows="3" name="Opis"></textarea>

        </div>

        <div class="form-group">
            <label>Zdjęcie</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="Zdjecie" accept="image/*">
                <label class="custom-file-label" for="exampleInputFile">Wybierz plik</label>
            </div>
        </div>

        <div class="form-group">
            <label>Kategoria</label>
            <select name="fk_kategorie" class="form-control">
                @foreach ($kategorie as $kategoria )
                <option value="{{ $kategoria->id }}"> {{ $kategoria->Nazwa  }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option>Wybierz statuj</option>
                <option value="1">Publikuj</option>
                <option value="0">Nie Publikuje</option>
            </select>
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
{!! JsValidator::formRequest('App\Http\Requests\Produkty\StoreProduktyRequest', '#produkty-form'); !!}



@endsection