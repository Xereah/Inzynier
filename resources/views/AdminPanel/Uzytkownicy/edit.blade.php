@extends('layouts.app')

@section('title', 'Uzytkownicy')
@section('content')
<div class="alert alert-warning" role="alert">
  Uwaga! przy każdej edycji wymagana jest zmiana hasła.
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edycja użytkownika</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <form id="Uzytkownicy-form" method="post" 
                action="{{ route('uzytkownik.update', $uzytkownik->id) }}">
                    @if(isset($edit) && $edit === true)
                         @method('PATCH')
                            @endif
                             @csrf
                            <div class="form-group">
                                <label>Imie</label>
                                <input type="hidden" name="userId" value="{{ $uzytkownik->id }}" class="form-control">
                                <input type="text" name="name" value="{{ $uzytkownik->name }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Nazwisko</label>
                                <input type="text" name="surname" value="{{ $uzytkownik->surname }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('surname') ? $errors->first('surname') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" name="phone" value="{{ $uzytkownik->phone }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $uzytkownik->email }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Hasło</label>
                                <input type="password" name="password" value="{{ $uzytkownik->password }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Rola</label>
                                <select name="level" class="form-control">
                                    <option value="{{ $uzytkownik->level }}">{{ $uzytkownik->level == 1 ? 'Administrator':'Uzytkownik' }}</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Użytkownik</option>
                                </select>
                                <span class="text-danger">
                                    {{ $errors->has('level') ? $errors->first('level') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="adress" value="{{ $uzytkownik->adress }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('adress') ? $errors->first('adress') : '' }}
                                </span>
                            </div>
                        <button type="submit" name="btn" class="btn btn-success" style="float:right">Aktualizacja</button>
                      </form>
                     
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Uzytkownicy\UpdateUzytkownicyRequest', '#Uzytkownicy-form'); !!}



@endsection