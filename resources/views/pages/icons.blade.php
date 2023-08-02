@extends('layouts.app', ['activePage' => 'loans', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Deposits', 'activeButton' => 'laravel'])

@section('content')
<div class="row" style="margin-top:50px; padding: 0px 10px; display: flex; justify-content:space-center; width: 100% ">
                <div class="col-md-5">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Summary of Deposits') }}</h4>
                            <p class="card-category">{{ __('Deposits in a day, month and year') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Yearly Deposits') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Monthyly Deposits') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Daily Deposits') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div>
                        </div>
                    </div>
                </div>

                    @push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush


        <div class="col-md-7" style="">
        <div style="display: flex; flex-direction: column; gap: 10px;" class="row">
            <div class="" style="width: 100%">
                <div class="rounded-rectangle " style="width: 100%; height: 200px; background-color:White; padding: 20px;border-radius: 10px;">
                    <p>Collection Statistics</p>
                    <div class="rounded-rectangle " style="width: 100%; height: 30px; background:linear-gradient(pink,green); padding: 20px;border-radius: 10px;">
                    <p>20% Completed Deposits For Monthly Target</p>
                </div>
                </div>        
            </div>
            <div class="container-fluid" style="width: 100%">
                <!-- <div class="row">
                    <div class=""> -->
                        <div class="card " >
                            <div class="card-header ">
                                <h4 class="card-title">{{ __('Deposit summary yearly') }}</h4>
                                <p class="card-category">{{ __('Deposits') }}</p>
                            </div>
                            <div class="card-body ">
                                <div id="chartActivity" class="ct-chart"></div>
                            </div>
                            <div class="card-footer ">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> {{ __('Full deposits') }}
                                    <i class="fa fa-circle text-danger"></i> {{ __('Installment deposits') }}
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> {{ __('Data information certified') }}
                                </div>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
    </div>

 

    <!-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Light Bootstrap Table Heading</h4>
                            <p class="card-category">Created using Montserrat Font Family</p>
                        </div>
                        <div class="card-body">
                            <div class="typography-line">
                                <h1>
                                    <span>Header 1</span>The Life of LB Dashboard </h1>
                            </div>
                            <div class="typography-line">
                                <h2>
                                    <span>Header 2</span>The Life of Light Bootstrap Dashboard </h2>
                            </div>
                            <div class="typography-line">
                                <h3>
                                    <span>Header 3</span>The Life of Light Bootstrap Dashboard </h3>
                            </div>
                            <div class="typography-line">
                                <h4>
                                    <span>Header 4</span>The Life of Light Bootstrap Dashboard </h4>
                            </div>
                            <div class="typography-line">
                                <h5>
                                    <span>Header 5</span>The Life of Light Bootstrap Dashboard </h5>
                            </div>
                            <div class="typography-line">
                                <h6>
                                    <span>Header 6</span>The Life of Light Bootstrap Dashboard </h6>
                            </div>
                            <div class="typography-line">
                                <p>
                                    <span>Paragraph</span>
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Quote</span>
                                <blockquote>
                                    <p class="blockquote blockquote-primary">
                                        "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                                        <br>
                                        <br>
                                        <small>
                                            - Noaa
                                        </small>
                                    </p>
                                </blockquote>
                            </div>
                            <div class="typography-line">
                                <span>Muted Text</span>
                                <p class="text-muted">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Primary Text</span>
                                <p class="text-primary">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...</p>
                            </div>
                            <div class="typography-line">
                                <span>Info Text</span>
                                <p class="text-info">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <span>Success Text</span>
                                <p class="text-success">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <span>Warning Text</span>
                                <p class="text-warning">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                </p>
                            </div>
                            <div class="typography-line">
                                <span>Danger Text</span>
                                <p class="text-danger">
                                    I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                                <h2>
                                    <span>Small Tag</span>
                                    Header with small subtitle
                                    <br>
                                    <small>Use "small" tag for the headers</small>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection -->

