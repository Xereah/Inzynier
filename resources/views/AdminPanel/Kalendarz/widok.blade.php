@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')
<div class="row">
<div class="col-sm-12">
<div class="py-4">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Informacje o Wpisie </h1>
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
                        <th>Nazwa</th>
                        <th>{{ $task->Nazwa }}</th> 
                    </tr>
                    <tr>
                        <th>Opis</th>
                        <th>{!! $task->Opis !!}</th> 
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>{!! $task->Data !!}</th> 
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


</div>
</div>
</div>
@endsection