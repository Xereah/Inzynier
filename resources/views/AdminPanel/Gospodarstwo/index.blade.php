@extends('layouts.app')

@section('title', 'Gospodarstwo')
@section('content')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Panel zarządzania gospodarstwem</h3>
    </div>
    <div class="panel-heading">
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
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
                        <a href="{{ route('gospodarstwo.show',$gospodarz->id)}}" title="Product Info"
                            class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('gospodarstwo.edit',$gospodarz->id)}}" title="Product Edit"
                            class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('/gospodarstwo/delete',$gospodarz->id)}}" title="Product Delete"
                            onclick="return confirm('Jesteś pewień że chcesz to usunąć?!');" class="btn btn-danger">
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



@endsection