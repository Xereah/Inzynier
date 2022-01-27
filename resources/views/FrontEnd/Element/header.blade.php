<header class="section-header">

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div>
                    <a href="{{ route('index.index') }}"><img src="{{url('/Zdjecie/logotransparent.png')}}"
                            style="width:200px;height:50px;float-left;"></a>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <form action="{{ url('search') }}" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="searchData" value="Jakiego produktu szukasz? "
                                onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> Szukaj
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <a href="{{ url('/cart') }}" class="icon icon-sm rounded-circle border"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <span class="badge badge-pill badge-danger notify">{{ Cart::content()->count() }}</span>
                        </div>
                        <div class="widget-header icontext">
                            <a href="{{ url('/uzytkownik/profil') }}" class="icon icon-sm rounded-circle border"><i
                                    class="fa fa-user"></i></a>

                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}">Logowanie </a> |
                            @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"> Rejestracja</a>
                            @endif
                            @else
                            <li class="nav-item dropdown" style="list-style-type:none;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Witaj {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/uzytkownik/profil') }}">
                                        {{ __('Ustawienia') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/uzytkownik/zamowienia') }}">
                                        {{ __('Zamówienia') }}
                                    </a>
                                    @can('update')
                                    <a class="dropdown-item" href="{{ url('/kokpit') }}">
                                        {{ __('Panel Administratora') }}
                                    </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endguest
                                </div>
                        </div>
                    </div>

                </div> <!-- widgets-wrap.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
</header> <!-- section-header.// -->


<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
            aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">


                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('index.index') }}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('produkty/menu')}}">Produkty</a>
                </li>



            </ul>
        </div> <!-- collapse .// -->
    </div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->