@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Użytkownik')
@section('content')
    <!-- login -->
    <!-- <div class="card mx-auto " style="max-width: 500px; margin-top:150px;margin:10px;">
      <div class="card-body">
        <h3 class="text-center">Profil Użytkownika</h3><br><br>
        <div>
            <table class="stripe">
                
                <tr>
                    <th>Imie</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->name }}</td>
                </tr>
             
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Nazwisko</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->surname }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->email }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Numer telefonu</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->phone }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Addres</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->adress }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th><a href="{{ url('/uzytkownik/edit-profile') }}" class="btn btn-info" role="button">Edycja profilu</a></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td><a href="{{ url('/uzytkownik/password-change') }}" class="btn btn-info float-right" role="button">Zmiana hasła</a></td>
                </tr>
            </table>
        </div>
    </div>

</div>
</div> -->
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Moje konto</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<ul class="list-group">
			<a class="list-group-item active" href="#"> Przegląd konta  </a>
			<a class="list-group-item" href="{{ url('/uzytkownik/zamowienia') }}"> Moje zamówienia </a>
			<a class="list-group-item" href="{{ url('/uzytkownik/edit-profile') }}">Ustawienia </a>
            <a class="list-group-item" href="{{ url('/uzytkownik/password-change') }}">Edycja hasła </a>
		</ul>
	</aside> <!-- col.// -->
	<main class="col-md-9">

		<article class="card mb-3">
			<div class="card-body">
				
				<figure class="icontext">
				
						<div class="text">
							<strong> {{ $Uzytkownik->name }}{{ $Uzytkownik->surname }} </strong> <br> 
							{{ $Uzytkownik->email }} <br> 
							<a href="{{ url('/uzytkownik/edit-profile') }}">Edytuj</a>
						</div>
				</figure>
				<hr>
				<p>
					<i class="fa fa-map-marker text-muted"></i> &nbsp; Adres:  
					 <br>
                     {{ $Uzytkownik->adress }}
					<a href="{{ url('/uzytkownik/edit-profile') }}" class="btn-link"> Edytuj</a>
				</p>

				

				<article class="card-group">
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title">{{$ZamowieniaSprzedane}}</h5>
							<span>Zamówienia udane</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title">{{$ZamowieniaPotwierdzone}}</h5>
							<span>Zamówienia potwierdzone</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title">{{$ZamowieniaWOczekiwaniu}}</h5>
							<span>Zamówienia w realizacji</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title">{{$Zamowienia}}</h5>
							<span>Zamówień łącznie</span>
						</div>
					</figure>
				</article>
				

			</div> <!-- card-body .// -->
		</article>

		<!-- <article class="card  mb-3">
			<div class="card-body">
				<h5 class="card-title mb-4">Ostatnie </h5>	

				<div class="row">
                @foreach($zamowieniaszczegoly as $ostatniezamowienie)
				<div class="col-md-6">
					<figure class="itemside  mb-3">
						<div class="aside"><i class="fas fa-cart-arrow-down fa-3x"></i></div>
						<figcaption class="info">
							<time class="text-muted"><i class="fa fa-calendar-alt"></i> {{$ostatniezamowienie->created_at}}</time>
							<p>{{$ostatniezamowienie->ZamowienieKoszt}}zł </p>
							<span class="text-warning">{{$ostatniezamowienie->ZamowienieStatus}}</span>
						</figcaption>
					</figure>
				</div> 
				@endforeach
				
			</div> 

			<a href="{{ url('/uzytkownik/zamowienia') }}" class="btn btn-outline-primary"> Wszystkie zamówienia  </a>
			</div> 
		</article>  -->

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>




@endsection
