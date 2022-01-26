@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Użytkownik')
@section('content')
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
                    <a class="list-group-item active" href="#"> Przegląd konta </a>
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
            </main> <!-- col.// -->
        </div>
    </div> <!-- container .//  -->
</section>




@endsection