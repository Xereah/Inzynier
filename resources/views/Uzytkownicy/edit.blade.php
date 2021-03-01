@extends('layouts.app')

@section('title', 'Uzytkownicy')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit User's Info
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <form id="uzytkownicy-form" method="post" action="{{ route('uzytkownik.update', $uzytkownik->id) }}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="userId" value="{{ $uzytkownik->id }}" class="form-control">
                                <input type="text" name="name" value="{{ $uzytkownik->name }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" value="{{ $uzytkownik->email }}" class="form-control">
                                <span class="text-danger">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Access Level</label>
                                <select name="level" class="form-control">
                                    <option value="{{ $uzytkownik->level }}">{{ $uzytkownik->level == 1 ? 'Admin':'Employee' }}</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Employee</option>
                                </select>
                                <span class="text-danger">
                                    {{ $errors->has('level') ? $errors->first('level') : '' }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $uzytkownik->adress }}</textarea>
                                <span class="text-danger">
                                    {{ $errors->has('address') ? $errors->first('address') : '' }}
                                </span>
                            </div>
                        <button type="submit" name="btn" class="btn btn-default">Update User Info</button>
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