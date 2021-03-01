@extends('layouts.app')

@section('title', 'Produkty')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dodawanie Produktu</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Dodawanie Produktu
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'produkty/save', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="hidden" name="id">
                            <input type="text" name="Nazwa" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Nazwa') ? $errors->first('Nazwa') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Cena</label>
                            <input type="number" name="Cena" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Cena') ? $errors->first('Cena') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Ilosc</label>
                            <input type="number" name="Ilosc" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Ilosc') ? $errors->first('Ilosc') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Jednostka Miary</label>
                            <select name="JednostkaMiary" class="form-control">
                                <option value="kg">kg</option>
                                <option value="sztuki">sztuki</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('JednostkaMiary') ? $errors->first('JednostkaMiary') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Opis</label>
                            <textarea class="form-control" rows="3" name="Opis"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Opis') ? $errors->first('Opis') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Zdjęcie</label>
                            <input type="file" name="Zdjecie" accept="image/*">
                          

                        </div>

                        <div class="form-group">
                            <label>Kategoria</label>
                            <select name="fk_kategorie" class="form-control">
                                <option value="1">Owoce</option>
                                <option value="2">Warzywa</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('fk_kategorie') ? $errors->first('fk_kategorie') : '' }}
                            </span>
                        </div>
                     
                        <button type="submit" name="btn" class="btn btn-default">Zaaktualizuj</button>
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