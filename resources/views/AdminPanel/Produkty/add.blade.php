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
          
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['url'=>'produkty/save', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form','id' =>'produkty-form']) !!}
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
                                <option>Wybierz statuj</option>
                                <option value="1">Publikuj</option>
                                <option value="0">Nie Publikuje</option>
                            </select>
                            <span class="text-danger">
                                {{ $errors->has('status') ? $errors->first('status') : '' }}
                            </span>
                        </div>
                     
                        <button type="submit" name="btn" class="btn btn-success przyciskwyslij">Dodaj Produkt do Bazy</button>
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
{!! JsValidator::formRequest('App\Http\Requests\Produkty\StoreProduktyRequest', '#produkty-form'); !!}



@endsection