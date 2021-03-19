@extends('layouts.app')

@section('title', 'Gospodarstwo')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dane Gospodarstwa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                Panel zarządzania Danymi Gospodarstwa
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Właściciel</th>
                            <th>Miejscowość</th> 
                            <th>Poczta</th>        
                            <th>Telefon</th>   
                            <th>Email</th>                        
                            <th width='180px'>Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gospodarstwo as $gospodarz)
                        <tr class="odd gradeX">
                            <td>{{ $gospodarz->Imie_Wlasciciel  }} {{ $gospodarz->Nazwisko_Wlasciciel  }}</td>
                            <td>{{ $gospodarz->Miejscowosc }}</td>
                            <td>{{ $gospodarz->Kod_Pocztowy  }} {{ $gospodarz->Poczta_Miejscowosc  }}</td>
                            <td>{{ $gospodarz->Telefon }}</td>
                            <td>{{ $gospodarz->Email }}</td>
                           
                            <td>
                                <a href="{{ route('gospodarstwo.show',$gospodarz->id)}}" title="Product Info" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('gospodarstwo.edit',$gospodarz->id)}}" title="Product Edit" class="btn btn-success">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url('/gospodarstwo/delete',$gospodarz->id)}}" title="Product Delete" onclick="return confirm('Jesteś pewień że chcesz to usunąć?!');" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                
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