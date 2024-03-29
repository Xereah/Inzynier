@extends('layouts.auth')

@section('title', 'Reset Hasła')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

            <div class="col-lg-6">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Hasła</h1>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="user">
                    @csrf

                    <div class="form-group">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" required placeholder="Adres Email...">

                    @error('email')
                        <span class="invalid-feedback ml-2 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Wyślij link do zmiany hasła 
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>

    </div>
@endsection
