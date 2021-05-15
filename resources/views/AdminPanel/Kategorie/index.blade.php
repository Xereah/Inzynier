@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Panel zarządzania kategoriami</h3>
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
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th width='180px'>Akcja</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategorie as $kategoria)
                <tr class="odd gradeX">
                    <td>{{ $kategoria->Nazwa  }}</td>
                    <td>{{ $kategoria->Opis }}</td>
                    <td>
                        <a href="{{ route('kategorie.show',$kategoria->id)}}" title="Product Info" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('kategorie.edit',$kategoria->id)}}" title="Product Edit"
                            class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('/kategorie/delete',$kategoria->id)}}" title="Product Delete"
                            onclick="return confirm('Jesteś pewień że chcesz to usunąć?!');" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection