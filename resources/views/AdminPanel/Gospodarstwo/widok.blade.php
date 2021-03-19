@extends('layouts.app')

@section('title', 'Gospodarstwo')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Informacje o Kategorii</h1>
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
                        <th>Id</th>
                        <th>{{ $gospodarstwo->id }}</th> 
                    </tr>
                    <tr>
                        <th>Imie</th>
                        <th>{{ $gospodarstwo->Imie_Wlasciciel }}</th> 
                    </tr>
                    <tr>
                        <th>Nazwisko</th>
                        <th>{{$gospodarstwo->Nazwisko_Wlasciciel}}</th> 
                    </tr>
                    <tr>
                        <th>Miejscowosc</th>
                        <th>{{$gospodarstwo->Miejscowosc}}</th> 
                    </tr>
                    <tr>
                        <th>Kod Pocztowy</th>
                        <th>{{$gospodarstwo->Kod_Pocztowy}}</th> 
                    </tr>
                    <tr>
                        <th>Poczta Miejscowosc</th>
                        <th>{{$gospodarstwo->Poczta_Miejscowosc}}</th> 
                    </tr>
                    <tr>
                        <th>Telefon</th>
                        <th>{{$gospodarstwo->Telefon}}</th> 
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>{{$gospodarstwo->Email}}</th> 
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