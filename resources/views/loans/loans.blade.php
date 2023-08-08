@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Loans', 'activeButton' => 'laravel'])

<!-- @section('summary')
    <div class="container" display: flex;>
            <aside class="sidebar" width: 250px;  background-color: #f2f2f2 padding: 20px>
                <h2>Dashboard Summary</h2>
                <p>Some summary information...</p>
            </aside>
            <main class="content"  flex: 1;  padding: 20px;>  
                <h1>Welcome to the Dashboard</h1>
                <p>Main content goes here...</p>
            </main>
    </div>
 @endsection -->

@section('content')
    <div class="content" >

    <div style="display: flex; justify-content: space-around">
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px;border-radius: 10px;">
          <a href=""><p style = "color: white">Active loans</p></a>
            <p style = "color: white">100</p>
            
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px;border-radius: 10px;">
            <p style = "color: white">Pending loans</p>
            <p style = "color: white">12</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px; border-radius: 10px;">
            <p style = "color: white">Paid loans</p>
            <p style = "color: white">10,000,000</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px; border-radius: 10px;">
            <p style = "color: white">Loan requests</p>
            <p style = "color: white">9</p>
        </div>
    </div>

        <div class="container-fluid" style="margin-top:50px">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Loan metrics') }}</h4>
                            <p class="card-category">{{ __('Past three months') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('June') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('July') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('August') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Last Updated 1st August') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Loans Behavior') }}</h4>
                            <p class="card-category">{{ __('24 Hours performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartHours" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Active Loans') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Pending Loans') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Paid Loans') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card-body table-full-width table-responsive">
                <h3>LOAN REQUESTS</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <!-- <th>Name</th> -->
                                    <th>Amount</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <!-- <td>Jjumba Benja</td> -->
                                        <td></td>
                                        <td>2023-11-17</td>
                                        <td>2024-03-17</td>
                                    </tr>           
                                </tbody>
                            </table>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
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
                </div>
                <div class="col-md-6">
                   <p>Hello</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush