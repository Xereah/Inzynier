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

    <link href="{{ asset('css/new/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/new/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/new/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    @yield('css-styles')
</head>
<body>
    {{-- Navbar --}}
    @include('FrontEnd.Element.header')
    <section class="section-main bg padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<nav class="card">
			<ul class="menu-category">
            @foreach($kategorie as $kategoria)
        <li><a class="category-item" href="{{ url('produkty/kategorie/'.$kategoria->id) }}">{{ $kategoria->Nazwa }}<i class="fas fa-chevron-right" style="float:right;"></i> </a></li>
           @endforeach
			</ul>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9">
		<article class="banner-wrap obrazek more">
        <h3>Codziennie <span>świeże</span> <br>produkty</h3>
        <a href="{{url('produkty/menu')}}" class="button--saqui button--round-l button--text-thick" data-text="Kup Teraz!">Kup Teraz!</a>
	
		</article>
	</div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- container //  -->
</section>
    @include('FrontEnd.Element.sidebar')
    <main role="main"  class="container col-sm-9 py-4 " style="background-color:white;min-height:700px;" >
        
        @yield('content')
    </main>
    <section class="section-name padding-y bg">
<div class="container">

<div class="row">
<div class="col-md-6">
	<h3>Codziennie przygotowujemy swoje produkty</h3>
	<p>Zapewniamy doskonałą jakość wraz z ceną</p>
</div>

</div> <!-- row.// -->
</div><!-- container // -->
</section>
</div>
</div>
    @include('FrontEnd.Element.footer')

    
    
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
