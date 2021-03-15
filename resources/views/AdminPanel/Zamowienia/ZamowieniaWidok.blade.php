@extends('layouts.app')

@section('title', 'Zamówienia')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Informacje o zamówieniach</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
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
                            <th>ID</th>
                            <th>Imie i nazwisko</th>
                            <th>Kwota zamówienia</th>
                            <th>Data zamówienia</th>
                            <th>Status zamówienia</th>
                            <th>Typ płatności</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zamowienia as $zamówienie)
                        <tr class="odd gradeX">
                            <td>{{ $zamówienie->id  }}</td>
                            <td>{{ $zamówienie->name.' '.$zamówienie->surname }}</td>
                            <td>{{ $zamówienie->ZamowienieKoszt.' zł' }}</td>
                            <td>{{ $zamówienie->created_at }}</td>
                            <td>{{ $zamówienie->ZamowienieStatus }}</td>
                            <td>{{ $zamówienie->platnosc }}</td>
                            <td>
                                <a href="{{ url('/zamowienie/podglad/'.$zamówienie->id) }}" title="podgląd zamówienia" class="btn btn-info">
                                <i class="fas fa-file-invoice"></i>
                                </a>
                                @if($zamówienie->ZamowienieStatus == 'W oczekiwaniu')
                                <a href="{{ url('/zamowienie/edit/'.$zamówienie->id) }}" title="Potwierdz" class="btn btn-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                <a href="{{ url('/zamowienie/delete/'.$zamówienie->id) }}" title="Przerwij" onclick="return confirm('Na pewno chcesz przerwać to zamówienie? Przerwanie zamówienia oznacza usunięcie go z bazy danych');" class="btn btn-danger">
                                <i class="fas fa-power-off"></i>
                                </a>
                                @elseif($zamówienie->ZamowienieStatus == 'Potwierdzone')
                     
                                <a href="{{ url('/zamowienie/delete/'.$zamówienie->id) }}" title="Order Sold" onclick="return confirm('Na pewno chcesz zmienić status na sprzedane?!');" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
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