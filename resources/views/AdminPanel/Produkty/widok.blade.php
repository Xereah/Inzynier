@extends('layouts.app')

@section('title', 'Produkty')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Informacje o Produkcie</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>ID Produktu</th>
                        <th>{{ $produkty->id }}</th>
                    </tr>
                    <tr>
                        <th>Nazwa</th>
                        <th>{{ $produkty->Nazwa }}</th>
                    </tr>
                    <tr>
                        <th>Cena</th>
                        <th>{{ $produkty->Cena }} zł</th>
                    </tr>
                    <tr>
                        <th>Ilość</th>
                        <th>{{ $produkty->Ilosc }}</th>
                    </tr>
                    <tr>
                        <th>Jednostka miary</th>
                        <th>{{ $produkty->JednostkaMiary }}</th>
                    </tr>
                    <tr>
                        <th>Opis</th>
                        <th>{!! $produkty->Opis !!}</th>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <th><img src="{{ asset($produkty->Zdjecie) }}" alt="{{ $produkty->Nazwa }}" height="300px"
                                width="300px"></th>
                    </tr>
                    <tr>
                        <th>Kategoria</th>
                        <th>{{ $produkty->kategoria->Nazwa }}</th>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


@endsection