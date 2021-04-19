@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Zamówienia')
@section('content')
<div class="row" style="margin-left:15%;margin-top:1%;">
    <div class="col-lg-12">
        <h1 class="page-header">Szczegóły zamówienia</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8" style="margin-left:15%;margin-top:1%;">
        <div class="panel panel-default">
            <div class="panel-body" style="border:5px solid black;">
                <style>
                    td, th{
                        font-size: 17px;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    td{
                        padding-left: 8px;
                        padding-right: 8px;
                    }
                    .rightTextAlign{
                        text-align: right;
                    }
                    .mypadding{
                        padding: 8px;
                    }
                </style>
                <table width="100%" >
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td rowspan="3"> </td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Identyfikator paragonu: {{ $zamowienia->id }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Stworzony: {{ $zamowienia->created_at }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">Zaktualizowany: {{ $zamowienia->updated_at }}</div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><h3>Informacje o sprzedającym:</h3></td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign"><h3>Informacje o kupującym</h3></div></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                        @foreach($gospodarstwo as $gospodarz)
                        {{$gospodarz->Imie_Wlasciciel}} {{$gospodarz->Nazwisko_Wlasciciel}} <br>
                        {{$gospodarz->Miejscowosc}}<br>
                        {{$gospodarz->Kod_Pocztowy}} {{$gospodarz->Poczta_Miejscowosc}}<br>
                        {{$gospodarz->Telefon}} <br>
                        {{$gospodarz->email}}
                         @endforeach</td>
                        <td>&nbsp;</td>
                        <td><div class="rightTextAlign">
                    
                        {{ $zamowienia->zamowienia->name. ' ' .$zamowienia->zamowienia->surname}}<br>
                        {{ $zamowienia->zamowienia->adress}}<br>
                        {{ $zamowienia->zamowienia->phone}}<br>
                    
                        </div></td>
                        
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                   
                       
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    
                      
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="background-color: #ddd;">
                        <th><div class="mypadding">Metoda Płatności</div></th>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                        @if( $zamowienia->fk_platnosc=='1')
                        Gotowka przy odbiorze
                        @elseif( $zamowienia->fk_platnosc=='2')
                       Online
                        @endif
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="background-color: #ddd;">
                        <th><div class="mypadding">Produkt</div></th>
                        <th><div class="mypadding">Ilosc</div></th>
                        <th><div class="rightTextAlign"><div class="mypadding">Cena</div></div></th>
                    </tr>
                    @foreach($zamowieniaSzczegoly as $szczegoly)
                    <tr  class="page-header">
                        <td>{{ $szczegoly->ProduktNazwa }}</td>
                        <td>{{ $szczegoly->ProduktIlosc }}</td>
                        <td><div class="rightTextAlign">{{ $szczegoly->ProduktCena.' zł' }}</div></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th  class="page-header"><div class="rightTextAlign"><div class="mypadding">Razem: {{ $zamowienia->ZamowienieKoszt.' zł' }}</div></div></th>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
@endsection



