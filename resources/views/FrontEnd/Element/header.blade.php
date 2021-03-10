<div class="agileits_header">
    <div class="w3l_offers">
        <a href="{{ route('index.index') }}">Sklep Warzywny !</a>
    </div>
    <div class="w3l_header_right1">
        <ul style="list-style-type:none;">
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span class="caret"></span></a>
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
        
        <h2><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"> </i></a></h2>
    </div>
    <a class="btn btn-floating m-2 w3l_header_right1 " href="#!" role="button">
        <i class="fab fa-facebook-f"></i></a>
      <a class="btn  btn-floating m-2 w3l_header_right1" href="#!" role="button">
          <i class="fab fa-twitter"></i
      ></a>
    <div class="clearfix"> </div>
</div>
<!-- <div class="w3l_search">
        <form action="{{ url('search') }}">
            <input type="text" name="searchData" value="Szukaj produktu..." onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
           <button class="btn-success  " type="submit">Szukaj</button> 
        </form>
    </div> -->
    <div class="search-container float-right w3l_search">
    <form action="{{ url('search') }}">
    <input type="text" name="searchData" value="Szukaj produktu..." onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ route('index.index') }}"><span>Gospodarstwo rolne </span> Struzik</a></h1>
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
