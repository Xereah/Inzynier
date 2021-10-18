@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Zamówienia')

@section('css-styles')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="margin-left:10%;margin-top:2%;">Informacje o zamówieniach</h1>
    </div>
    
    <!-- /.col-lg-12 -->
</div>
<div class="alert alert-info text-center" role="alert">
 <h4> Uwaga, w przypadku <b>zakupu towaru z odbiorem na rynku</b> wymagane jest poświadczenie w postaci wydruku <b>paragonu</b>!!</h4>
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
                            <th>Rodzaj płatności</th>
                            <th>Termin odbioru na rynku</th>
                            <th>Paragon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zamowienia as $zamówienie)
                        <tr class="odd gradeX">
                            
                            <td>{{ $uzytkownik->name.' '.$uzytkownik->surname }}</td>
                            
                            <td>{{ $zamówienie->created_at }}</td>
                            
                            <td>{{ $zamówienie->ZamowienieStatus }}</td>
                            <td> {{ $zamówienie->zamowieniaplatnosc->platnosc }}   </td>
                            @if($zamówienie->fk_platnosc== 1)
                            <td>{{ $tasks-> Data }}</td>
                            @else 
                            <td></td>
                            @endif
                            <td>  <a href="{{ url('/uzytkownik/zamowienia/szczegoly/'.$zamówienie->id) }}" title="paragon" class="btn btn-info">
                                Paragon fiskalny
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

@section('js-scripts')
    <script src="{{ asset('js/datatables-demo.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@endsection