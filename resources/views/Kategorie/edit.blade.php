@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edycja Kategorii</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Aktualizacja Kategorii
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route'=>['update', $kategorie->id], 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form']) !!}
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="hidden" name="id" value="{{ $kategorie->id }}">
                            <input type="text" name="Nazwa" value="{{ $kategorie->Nazwa }}" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Nazwa') ? $errors->first('Nazwa') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Opis</label>
                            <textarea class="form-control" rows="3" name="Opis">{{ $kategorie->Opis }}</textarea>
                            <span class="text-danger">
                                {{ $errors->has('Opis') ? $errors->first('Opis') : '' }}
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