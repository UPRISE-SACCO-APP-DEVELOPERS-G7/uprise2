@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])
<!-- <!..@section('summary')
<div class="container" display: flex;>
        <aside class="sidebar" width: 250px;  background-color: #f2f2f2 padding: 20px>
        <h2>Dashboard Summary</h2>
            <p>Some summary information...</p>
        </aside>
        <main class="content"  flex: 1;  padding: 20px;>  
        <h1>Welcome to the Dashboard</h1>
            <p>Main content goes here...</p>
        </main>
        @section('summary')
    <div class="container"display: flex;>
        <aside class="sidebar" width: 250px; background-color: #f2f2f2; padding: 20px;>
        <h2>Dashboard Summary</h2>
        <p>Some summary information...</p>
        </aside>
        <main class="content"  flex: 1; padding: 20px;>
        <h1>Welcome to the Dashboard</h1>
        <p>Main content goes here...</p>
        </main>
    </div>..> -->

@section('content')
    <div class="content" >

    <div style="display: flex; justify-content: space-around">
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:Blue; padding: 20px;border-radius: 10px;">
            <p>Members</p>
            <p>100</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:white; padding: 20px;border-radius: 10px;">
            <p>Requests</p>
            <p>12</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:Green; padding: 20px; border-radius: 10px;">
            <p>Deposits</p>
            <p>10,000,000</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:Purple; padding: 20px; border-radius: 10px;">
            <p>Active Loans</p>
            <p>9</p>
        </div>
    </div>

        <div class="container-fluid" style="margin-top:50px">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Email Performance Metrics') }}</h4>
                            <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                            <p class="card-category">{{ __('24 Hours performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartHours" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
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
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Deposits</th>
                                    <th>Status</th>
                                  
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jjumba Benja</td>
                                        <td>2,300,000</td>
                                        <td>Active</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Loor Jacobson</td>
                                        <td>1,459,000</td>
                                        <td>Inactive</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Ayiko Eddy</td>
                                        <td>750,000</td>
                                        <td>Active</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Naka Mary</td>
                                        <td>500,000</td>
                                        <td>Inactive</td>
                                        
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
                    <!-- <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Tasks') }}</h4>
                            <p class="card-category">{{ __('Backend development') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
<!-- @endsection -->

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush