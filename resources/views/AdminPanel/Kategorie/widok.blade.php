@extends('layouts.app')

@section('title', 'Kategorie')
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
                        <th>ID Kategorii</th>
                        <th>{{ $kategorie->id }}</th>
                    </tr>
                    <tr>
                        <th>Nazwa</th>
                        <th>{{ $kategorie->Nazwa }}</th>
                    </tr>
                    <tr>
                        <th>Opis</th>
                        <th>{!! $kategorie->Opis !!}</th>
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