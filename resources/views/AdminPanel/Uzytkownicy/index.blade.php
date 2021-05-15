@extends('layouts.app')

@section('title', 'Uzytkownicy')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Panel zarządzania użytkownikami</h3>
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
                    <th>Id</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Telefon</th>
                    <th>Adress</th>
                    <th>Email</th>
                    <th width='180px'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($uzytkownik as $user)
                <tr class="odd gradeX">
                    <td>{{ $i++  }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{!! $user->adress !!}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{  route('uzytkownik.edit', $user->id) }}" class="btn btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('uzytkownik.destroy', $user->id) }}"
                            onclick="return confirm('Jesteś pewien że chcesz usunąć tego uzytkownika?!');"
                            class="btn btn-danger">
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