<!-- <div class="agileits_header">
    <div class="w3l_offers"> -->
        <!-- <a href="{{ route('index.index') }}">Sklep Warzywny !</a> -->
          <!-- <a class="btn btn-floating m-2 w3l_header_right1 " href="https://www.facebook.com/patryk.struzik.5" role="button">
        <i class="fab fa-facebook-f fa-lg"></i> Facebook</a>
      <a class="btn  btn-floating m-2 w3l_header_right1" href="https://twitter.com/?lang=pl" role="button">
          <i class="fab fa-twitter fa-lg"> Twitter</i></a>
          <a class="btn  btn-floating m-2 w3l_header_right1"  role="button">
          <i class="fa fa-phone fa-lg"></i> 513623174</a>
          
    </div>
    <div class="w3l_header_right1">
        
        <ul style="list-style-type:none;">
        
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;"><i class="fa fa-user fa-lg" aria-hidden="true"> Twoje konto</i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                        @guest

@if (Route::has('login'))
<li class="nav-item">
    
    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Logowanie!') }}</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-plus-circle"></i> {{ __('Rejestracja') }}</a>
</li>
@endif
@else
<li class="nav-item dropdown">
   
       
       <p> <a href="{{ url('/uzytkownik/profil') }}">Witaj {{ Auth::user()->name }}</a> </p>
  

   
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Wyloguj') }}
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

</li>
@endguest
                        </ul>
                    </div>                  
                </div>	
            </li>
        </ul>
    </div>
    <div class="w3l_header_right1">

    
        
        <h2><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart "><sup class="circle" > {{ Cart::content()->count() }}</sup> </i></a></h2>
    </div>
    
    <div class="clearfix"> </div>
    <div class="search-container float-right w3l_search">
    <form action="{{ url('search') }}">
    <input type="text" name="searchData" value="Jakiego produktu szukasz? " onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    
  </div>
</div>  

  
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ route('index.index') }}"><span>Gospodarstwo rolne </span>@foreach($gospodarstwo as $gospodarz) {{$gospodarz->Nazwisko_Wlasciciel}} @endforeach</a></h1>
            <a class="btn btn-floating m-2" href="{{ route('index.index') }}" role="button"> Strona Główna</a> |
            <a class="btn btn-floating m-2" href="{{url('produkty/menu')}}" role="button"> Produkty</a> |
            <a class="btn btn-floating m-2" href="https://www.facebook.com/patryk.struzik.5" role="button"> Kontakt</a> 
        </div>
        
        <div class="clearfix"> </div>
       
    </div>
   
</div>

<br> -->


<header class="section-header">

<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-4">
	<a href="{{ route('index.index') }}"><span>Gospodarstwo rolne </span>@foreach($gospodarstwo as $gospodarz) {{$gospodarz->Nazwisko_Wlasciciel}} @endforeach</a>
	</div>
	<div class="col-lg-6 col-sm-12">
		<form action="{{ url('search') }}" class="search">
			<div class="input-group w-100">
            <input type="text" class="form-control" name="searchData" value="Jakiego produktu szukasz? " onfocus="this.value = '';" onblur="if (this.value == '') {
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
				<a href="{{ url('/cart') }}" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
				<span class="badge badge-pill badge-danger notify">{{ Cart::content()->count() }}</span>
			</div>
			<div class="widget-header icontext">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
				
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
                              Witaj  {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/uzytkownik/profil') }}" >
                                    {{ __('Ustawienia') }}
                                </a>

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

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
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