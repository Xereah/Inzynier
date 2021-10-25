@extends('layouts.app')

@section('title', 'Produkty')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edycja danych produktu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['url'=>'produkty/update', 'method'=>'POST', 'enctype'=>'multipart/form-data',
    'name'=>'editProductForm', 'role'=>'form','id' =>'produkty-form']) !!}
    <div class="card-body">
        <div class="form-group">
            <label>Nazwa</label>
            <input type="hidden" name="id" value="{{ $produkty->id }}">
            <input type="text" name="Nazwa" value="{{ $produkty->Nazwa }}" class="form-control">

        </div>
        <div class="form-group">
            <label>Cena</label>
            <input type="number" name="Cena" value="{{ $produkty->Cena }}" class="form-control">

        </div>
        <div class="form-group">
            <label>Ilosc</label>
            <input type="number" name="Ilosc" value="{{ $produkty->Ilosc }}" class="form-control">

        </div>
        <div class="form-group">
            <label>Jednostka Miary</label>
            <select name="JednostkaMiary" class="form-control">
                <option value="{{ $produkty->JednostkaMiary }}">{{ $produkty->JednostkaMiary }}</option>
                <option value="kg">kg</option>
                <option value="sztuki">sztuki</option>
            </select>

        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" rows="3" name="Opis">{{ $produkty->Opis }}</textarea>

        </div>

        <div class="form-group">
            <label>Zdjęcie</label>
            <input type="file" name="Zdjecie" accept="Zdjecie/*">
            <img src="{{ asset($produkty->Zdjecie) }}" alt="{{ $produkty->Nazwa }}" height="200px" width="200px">

        </div>


        <div class="form-group">
            <label>Kategoria</label>
            <select name="fk_kategorie" class="form-control">
                <option value="{{ $produkty->fk_kategorie }}"> {{ $produkty->kategoria->Nazwa }}</option>
                @foreach ($kategorie as $kategoria )
                <option value="{{ $kategoria->id }}"> {{ $kategoria->Nazwa  }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">

                <option value="{{ $produkty->status }}"> @if($produkty->status == 1)
                    Widoczny
                    @else
                    Nie Widoczny</option>
                @endif
                <option value="1">Publikuj</option>
                <option value="0">Nie publikuj</option>
            </select>

        </div>

        <div class="card-footer">
            <button type="submit" name="btn" class="btn btn-primary float-right">Zaaktualizuj</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Produkty\UpdateProduktyRequest', '#produkty-form'); !!}



@endsection