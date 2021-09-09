<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
<link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="{{ asset('css/progressbar.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/new/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/new/ui.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/new/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @yield('css-styles')
</head>
<body>
    {{-- Navbar --}}
    @include('FrontEnd.Element.header')
    <main class="col-md-12">

@yield('content')

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
    @include('FrontEnd.Element.footer')

    {{-- Głowny kontener --}}
    
    
</body>
{{-- JQuery Pooper Bootstrap --}}
<script type="text/javascript" src="{{ asset('js/external/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/external/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/external/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/minicart.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>

{{-- Funkcja debugująca --}}
{{-- Funkcja do debugowania JS--}}
@if (config('app.env') === 'dev')
    <script  type="text/javascript">
        var d = function(message) {
            console.log(message);
        }
    </script>
@else
    <script  type="text/javascript">
        var d = function(message) { }
    </script>
@endif
{{-- Globalne skrypty użytkownika  --}}
{{-- Lokalne skrypty JS --}}



@yield('js-scripts')
</html>
