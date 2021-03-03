  <div>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
   
            <a class="navbar-brand" href="#">Dzis oferujemy</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                  
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    <form class="form-inline">
                         <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Search">
                             <button class="btn btn-outline-success my-2 my-sm-0" type="Szukaj">Search</button>
                     </form>

                    </ul>

                    <!-- Right Side Of Navbar -->
                   
      
   

                    <ul class="navbar-nav ml-auto">
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
</div>
<br>
<br>
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
        <img src="{{url('/Zdjecie/GospodarstwoStruzik.jpg')}}" style="height:150px" class="zdjecie" alt="..." />
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="{{ url('/events') }}">Stron głowna</a><i>|</i></li>
                <li><a href="{{ url('/about') }}">O nas</a><i>|</i></li>
                <li><a href="{{ url('/contact') }}">Kontakt</a><i>|</i></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>513623174</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:28933@akademiakaliska.edu.pl">28933@akademiakaliska.edu.pl</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>