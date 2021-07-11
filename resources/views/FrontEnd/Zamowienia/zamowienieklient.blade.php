@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Zamówienia')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="margin-left:10%;margin-top:2%;">Informacje o zamówieniach</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row col-lg-10" style="margin-left:10%; margin-top:5%;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Wszystkie zmówienia
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr>
                            
                            <th>Imie i nazwisko</th>
                            <th>Data zamówienia</th>
                            <th>Status zamówienia</th>
                            <th>Szczegóły</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zamowienia as $zamówienie)
                        <tr class="odd gradeX">
                            
                            <td>{{ $uzytkownik->name.' '.$uzytkownik->surname }}</td>
                            
                            <td>{{ $zamówienie->created_at }}</td>
                            <td>{{ $zamówienie->ZamowienieStatus }}</td>
                            <td>  <a href="{{ url('/uzytkownik/zamowienia/szczegoly/'.$zamówienie->id) }}" title="podgląd zamówienia" class="btn btn-info">
                                <i class="fas fa-file-invoice"></i>
                                </a></td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection