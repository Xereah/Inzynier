@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="tytul" >
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body "style="text-align: center;">Witaj w panelu zarządzania internetowym sklepem dla małych gospodarst rolnych</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                      
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>


                                   <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Ilość sprzedanych warzyw
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Aktualizowane wczoraj 11:59</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Miesięczna liczba odwiedzin
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Aktualizowane wczoraj 11:59</div>
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
@endsection

@section('js')
<script src="{{ asset('js/wykresy/chart-area-demo.js') }}" defer></script>
    <script src="{{ asset('js/wykresy/chart-bar-demo.js') }}" defer></script>
    <script src="{{ asset('js/wykresy/chart-pie-demo.js') }}" defer></script>
 @endsection