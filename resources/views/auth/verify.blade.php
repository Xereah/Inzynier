@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potwierdź swój adress Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Wysłano link aktywacyjny na twoją pocztę.') }}
                        </div>
                    @endif

                    {{ __('Przed kontynuacją, sprawdź swoją pocztę z linkiem sprawdzajacym.') }}
                    {{ __('Jeżeli nie dostałeś maila') }}, <a href="{{ route('verification.resend') }}">{{ __('Kliknij aby wysłać ponownie') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
