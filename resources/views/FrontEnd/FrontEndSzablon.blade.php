<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('css-styles')

</head>

<body>


    @include('FrontEnd.Element.header')
    
   

        <main class="py-4">
            @yield('content')
        </main>
        <!-- ty była stopka -->
    </div>
    <script type="text/javascript" src="{{ url('js/app.js') }}"></script>

</body>



<script type="text/javascript" src="{{ url('js/external/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/external/datatables.min.js') }}"></script>

<script type="text/javascript" src="{{ url('js/custom2.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/default_datatable_settings.js') }}"></script>



{{-- Funkcja debugująca --}}
{{-- Funkcja do debugowania JS--}}
@if (config('app.env') === 'dev')
<script type="text/javascript">
    var d = function (message) {
        console.log(message);
    }
</script>
@else
<script type="text/javascript">
    var d = function (message) {}
</script>
@endif
{{-- Globalne skrypty użytkownika  --}}
{{-- Lokalne skrypty JS --}}
@yield('js-scripts')

</html>