@extends('FrontEnd.FrontEndSzablon3')
@section('title', 'Zamówienia')
@section('css-styles')
<link href="{{ asset('css/faktura.css' ) }}" rel="stylesheet">
@endsection
@section('content')

<div class="print ">
                        <button class="print-link no-print float-right" onclick="jQuery('#ele2').print()">
								<i class="fa fa-print" ></i>
								Drukuj fakture
                                </button>
						</div>
                        
<div class="receipt-content"id="ele2" >
    <div class="container bootstrap snippets bootdey" > 
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-wrapper">
					<div class="intro">
						Witaj <strong>{{ $zamowienia->zamowienia->name. ' ' .$zamowienia->zamowienia->surname}}</strong>, 
						<br>
						Paragon wystawiony na kwote  <strong>{{ $zamowienia->ZamowienieKoszt.' zł' }}</strong> za dokonane zakupy
					</div>

					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Paragon nr.</span>
								<strong>{{$zamowienia->id}}</strong>
							</div>
							<div class="col-sm-6 text-right">
								<span>Data Płatności</span>
								<strong>{{ $zamowienia->created_at }}</strong>
							</div>
						</div>
					</div>

					<div class="payment-details">
						<div class="row">
							<div class="col-sm-6">
								<span>Klient</span>
								<strong>
                                {{ $zamowienia->zamowienia->name. ' ' .$zamowienia->zamowienia->surname}}
								</strong>
								<p>
                                {{ $zamowienia->zamowienia->adress}}<br>
									<a href="mailto: {{ $zamowienia->zamowienia->email}}">
                                    {{ $zamowienia->zamowienia->email}}<br>
									</a>
								</p>
							</div>
							<div class="col-sm-6 text-right">
								<span>Producent</span>
                                @foreach($gospodarstwo as $gospodarz)
								<strong>
                                {{$gospodarz->Imie_Wlasciciel}} {{$gospodarz->Nazwisko_Wlasciciel}}
								</strong>
								<p>
                                {{$gospodarz->Miejscowosc}}<br>
                        {{$gospodarz->Kod_Pocztowy}} {{$gospodarz->Poczta_Miejscowosc}}<br>
                        {{$gospodarz->Telefon}} <br>
                       
									<a href="mailto: patrykstruzik@onet.pl">
                                    patrykstruzik@onet.pl
									</a>
                                    @endforeach
								</p>
							</div>
						</div>
					</div>

					<div class="line-items">
						<div class="headers clearfix">
							<div class="row">
								<div class="col-sm-4">Nazwa</div>
								<div class="col-sm-4">Ilość</div>
								<div class="col-sm-4 text-right">Cena</div>
							</div>
						</div>
                        @foreach($zamowieniaSzczegoly as $szczegoly)
						<div class="items">
							<div class="row item">
								<div class="col-sm-4 desc">
                                {{ $szczegoly->ProduktNazwa }}
								</div>
								<div class="col-sm-4 qty">
                                {{ $szczegoly->ProduktIlosc }}
								</div>
								<div class="col-sm-4 amount text-right">
								{{ $szczegoly->ProduktCena }}zł
								</div>
							</div>							
						</div>
                        @endforeach
						<div class="total text-right">
							<p class="extra-notes">
								<strong>Dodatkowa informacja</strong>
								Faktura została wygenerowana automaczynie i jest potwierdzeniem odbioru zamówienia
                                na targu
							</p>
							<div class="field">
								Cena łączna <span>{{ $zamowienia->ZamowienieKoszt.' zł' }}</span>
							</div>
							<div class="field">
								Wysyłka <span>0.00zł</span>
							</div>
							<div class="field">
								Zniżka <span>0.0%</span>
							</div>
							<div class="field grand-total">
								Koszt całkowity <span>{{ $zamowienia->ZamowienieKoszt.' zł' }}</span>
							</div>
						</div>

					
					</div>
				</div>
              
                <!-- <button onclick="window.print()">Print this page</button> -->
			</div>
		</div>
	</div>
</div>                    
@endsection


@section('js-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="../bower_components/jquery/dist/jquery.min.js"><\/script>')
        </script>
        <script  type="text/JavaScript"src="{{ asset('js/print.js') }}"></script>
        <script type='text/javascript'>
        //<![CDATA[
        jQuery(function($) { 'use strict';
            $("#ele2").find('.print-link').on('click', function() {
                //Print ele2 with default options
                $.print("#ele2");
            });
            $("#ele4").find('button').on('click', function() {
                //Print ele4 with custom options
                $("#ele4").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                    prepend : "Hello World!!!<br/>",
                    //Add this on bottom
                    append : "<span><br/>Buh Bye!</span>",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
            });
            // Fork https://github.com/sathvikp/jQuery.print for the full list of options
        });
        //]]>
        </script>
@endsection



