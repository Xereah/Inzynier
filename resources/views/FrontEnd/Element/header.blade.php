<nav class="navbar navbar-expand-md navbar-light ">
 <!-- <a class="navbar-brand" href="#">Sklep Warzywny  </a>  -->



<button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">  </button>


    {{-- MENU APLIKACJI --}}
    <div class="collapse navbar-collapse" id="mainNavbar">
    
    </div>

    {{-- LINKI UWIERZYTELNIENIA UZYTKOWNIKA --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

<!-- 
    <form class="form-inline">
                         <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Search">
                             <button class="btn btn-outline-success my-2 my-sm-0" type="Szukaj">Search</button>
                     </form> -->

        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        @guest

@if (Route::has('login'))
<li class="nav-item">
    
    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Zaloguj się!') }}</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-plus-circle"></i> {{ __('Rejestracja') }}</a>
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

<!-- ------------------------------------------------------------------- -->

<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="collapse navbar-collapse" id="mainNavbar">
  <p><h2>Sklep Warzywny</h2></p>
    <ul class="navbar-nav mr-auto menu1 ">

    </ul>
    <a class="nav-link"><h3><i class="fas fa-bus"></i> Odbiór na rynku lub wysyłka</h3> </a>
    <a class="nav-link"><h3><i class="fas fa-phone-volume"></i>  Tel: 513623174</h3> </a>
    <form class="form-inline my-2 my-lg-0" style="margin-right: 5%;">
      <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
    </form>
    <h2><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"  > <sup>3</sup> </i></a></h2>
  </div>
</nav>
<div class="spacer">

</div>

@include('FrontEnd.Element.sidebar')