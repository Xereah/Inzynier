<nav class="navbar navbar-expand-md navbar-dark bg-dark ">



<a class="navbar-brand" href="#">Dzis oferujemy   </a>
<button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">  </button>


    {{-- MENU APLIKACJI --}}
    <div class="collapse navbar-collapse" id="mainNavbar">
    
    </div>

    {{-- LINKI UWIERZYTELNIENIA UZYTKOWNIKA --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <form class="form-inline">
                         <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Search">
                             <button class="btn btn-outline-success my-2 my-sm-0" type="Szukaj">Search</button>
                     </form>

        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <h2><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart" > <sup>3</sup> </i></a></h2>
        @guest

@if (Route::has('login'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif




@else



<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
@endguest
        </ul>
    </div>
</nav>


@include('FrontEnd.Element.sidebar')