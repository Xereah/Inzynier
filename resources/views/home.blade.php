@extends('layouts.app')

@section('title', 'Home')

@section('content')



<div class="tytul">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$zamowienia}}</h3>
                    <p>Nowych zamówień</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('/zamowienia')}}" class="small-box-footer">Więcej szczegółów <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$produkty}}</h3>
                    <p>Produkty w aplikacji</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('produkt.index')}}" class="small-box-footer">Więcej szczegółów <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$uzytkownicy}}</h3>
                    <p>Zarejestrowanych użytkowników</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('uzytkownik.index')}}" class="small-box-footer">Więcej szczegółów <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$termin->Data}}</h3>
                    <p>Następna wizyta na targu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('task.index')}}" class="small-box-footer">Więcej szczegółów <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>
</div>


<div class="card mb-4">

    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Najnowsze zamówienia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imie i nazwisko</th>
                            <th>Kwota zamówienia</th>
                            <th>Data zamówienia</th>
                            <th>Status zamówienia</th>
                            <th>Typ płatności</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zamowieniawidok as $zamówienie)
                        <tr>
                            <td>{{$zamówienie->id}}</a></td>
                            <td>{{ $zamówienie->name.' '.$zamówienie->surname }}</td>
                            <td>{{ $zamówienie->ZamowienieKoszt.' zł' }}</td>
                            <td>{{  $zamówienie->created_at }}</td>

                            @if($zamówienie->ZamowienieStatus == 'Potwierdzone')
                            <td><span class="badge badge-warning">{{ $zamówienie->ZamowienieStatus }}</span></td>

                            @elseif($zamówienie->ZamowienieStatus == 'W oczekiwaniu')
                            <td><span class="badge badge-danger">{{ $zamówienie->ZamowienieStatus }}</span></td>

                            @elseif($zamówienie->ZamowienieStatus == 'Sprzedane')
                            <td><span class="badge badge-success">{{ $zamówienie->ZamowienieStatus }}</span></td>
                            @endif
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $zamówienie->platnosc }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{ url('/zamowienia')}}" class="btn btn-sm btn-secondary float-right">Przejdź do edycji zamówień</a>
        </div>
        <!-- /.card-footer -->
    </div>
</div>

<div class="row">
    <div class="card" style="margin-left:100px; margin-right:50px;">
        <div class="card-header border-0">
            <h3 class="card-title">Brak produktów na stanie</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Produkt</th>
                    </tr>
                </thead>
                <tbody>
                @if($produktystanilosc != 0)
                    @foreach($produktystan as $stan)
                    <tr>
                        <td>
                            <img src="{{$stan->Zdjecie}}" alt="{{$stan->Nazwa}}" class="img-circle img-size-32 mr-2">
                            {{$stan->Nazwa}}
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                <p>Wszystkie produkty są dostępne</p>
                      </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie mr-1"></i>
                Wykres najchętniej kupowanych produktów
            </div>
            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
            <div class="card-footer small text-muted">Aktualizowane wczoraj 11:59</div>
        </div>
    </div>
</div>


<div class="card" style="margin-left:10px;">
    <div class="card-header border-0">
        <h3 class="card-title">Produkty</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Cena </th>
                    <th>Sprzedaż</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produktylista as $lista)
                <tr>
                    <td>
                        <img src="{{$lista->Zdjecie}}" alt="{{$lista->Nazwa}}" class="img-circle img-size-32 mr-2">
                        {{$lista->Nazwa}}
                    </td>
                    <td>{{$lista->Cena}} zł</td>
                    <td>
                        <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            {{rand(5, 15)}}%
                        </small>
                        {{rand(5, 150)}} sprzedanych
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

    @section('js')
    <script src="{{ asset('js/wykresy/chart-area-demo.js') }}" defer></script>
    <script src="{{ asset('js/wykresy/chart-bar-demo.js') }}" defer></script>
    <script src="{{ asset('js/wykresy/chart-pie-demo.js') }}" defer></script>
    @endsection