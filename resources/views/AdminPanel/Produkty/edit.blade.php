@extends('layouts.app')

@section('title', 'Produkty')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edycja Produktu</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Aktualizacja Produktu
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'produkty/update', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="hidden" name="id" value="{{ $produkty->id }}">
                            <input type="text" name="Nazwa" value="{{ $produkty->Nazwa }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Nazwa') ? $errors->first('Nazwa') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Cena</label>
                            <input type="number" name="Cena" value="{{ $produkty->Cena }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Cena') ? $errors->first('Cena') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Ilosc</label>
                            <input type="number" name="Ilosc" value="{{ $produkty->Ilosc }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Ilosc') ? $errors->first('Ilosc') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Jednostka Miary</label>
                            <select name="JednostkaMiary" class="form-control">
                                <option value="{{ $produkty->JednostkaMiary }}">{{ $produkty->JednostkaMiary }}</option>
                                <option value="kg">kg</option>
                                <option value="sztuki">sztuki</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('JednostkaMiary') ? $errors->first('JednostkaMiary') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Opis</label>
                            <textarea class="form-control" rows="3" name="Opis">{{ $produkty->Opis }}</textarea>
                            <span class="text-danger">
                                {{ $errors->has('Opis') ? $errors->first('Opis') : '' }}
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Zdjęcie</label>
                            <input type="file" name="Zdjecie" accept="Zdjecie/*" >
                            <img src="{{ asset($produkty->Zdjecie) }}" alt="{{ $produkty->Nazwa }}" height="200px" width="200px">
                         
                        </div>
                    

                        <div class="form-group">
                            <label>Kategoria</label>
                            <select name="fk_kategorie" class="form-control">
                                @foreach ($kategorie as $kategoria )
                        <option value="{{ $kategoria->id }}"> {{ $kategoria->Nazwa  }}</option>
                        @endforeach
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('fk_kategorie') ? $errors->first('fk_kategorie') : '' }}
                            </span>
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
                            <span class="text-danger">
                                {{ $errors->has('status') ? $errors->first('status') : '' }}
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