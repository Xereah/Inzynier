@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dodawanie Kategorii</h1>
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
                        {!! Form::open(['url'=>'kategorie/store', 'method'=>'POST',  'enctype'=>'multipart/form-data', 'name'=>'editProductForm', 'role'=>'form','id' =>'kategorie-form']) !!}
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="hidden" name="id">
                            <input type="text" name="Nazwa" class="form-control">
                            <span class="text-danger">
                                {{ $errors->has('Nazwa') ? $errors->first('Nazwa') : '' }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Opis</label>
                            <textarea class="form-control" rows="3" name="Opis"></textarea>
                            <span class="text-danger">
                                {{ $errors->has('Opis') ? $errors->first('Opis') : '' }}
                            </span>
                        </div>
                     
                        <button type="submit" name="btn" class="btn btn-success przyciskwyslij">Dodaj Kategorie do Bazy</button>
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

{{-- Dodanie do szablonu lokalnych skryptów JS --}}
{{-- Tagi {!! !!} powoduje, że kod w nim zawarty nie jest przepuszczany przez htmlspecial characters --}}
@section('js-scripts')
{{-- Laravel Javascript Validation --}}
<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{{-- Walidacja po stronie klienta z użyciem reguł walidacji po stronie serwera --}}
@if(isset($edit) && $edit === true)
{!! JsValidator::formRequest('App\Http\Requests\Kategorie\UpdateKategorieRequest', '#kategorie-form'); !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Kategorie\StoreKategorieRequest', '#kategorie-form'); !!}
@endif
@endsection