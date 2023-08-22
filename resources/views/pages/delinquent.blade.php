@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Loans', 'activeButton' => 'laravel'])
@section('content')

<nav class="navbar">
    <ul class="nav-list">
    <li class="nav-item @if($activePage == 'loans') active @endif">
            <a class="nav-link" href="{{route('all_loans')}}">Requests</a>
        </li>
       <li class="nav-item"><a href="{{route('loans.in.progress')}}">In Progress</a></li>
       <li class="nav-item"><a href="{{route('cleared.loans')}}">Cleared</a></li>
        <li class="nav-item"><a href="{{route('delinquent.loans')}}">Delinquent</a></li>
        <li class="nav-item"><a href="{{route('default.loans')}}">Defaulted</a></li>
       
    </ul>
</nav>
    <div class="content" >
    
        <!-- <div style="display: flex; justify-content: space-around">
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
            <a href=""><p style = "color: white">ACCEPTED</p></a>
                <p style = "color: white">80</p>
                
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
                <p style = "color: white">PENDING</p>
                <p style = "color: white">90</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">SHORTLISTED </p>
                <p style = "color: white">90</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">DISAPPROVED</p>
                <p style = "color: white">0</p>
            </div>
        </div> -->
        <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <h4>Breakdown of deliquency</h4>
                            <div class="chart">
                            <canvas id= "DelinquencyChart" style="width: 500px; height: 300px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "approvedRejectedPieChart" style="width: 500px; height: 300px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                </div>

       
    </div>           

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <script>
        var ctx = document.getElementById('DelinquencyChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['less than 50%', 'Above 50%'],
                datasets: [{
                    data: [20, 30],
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    

@endsection
<style>
.card {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-card {
            padding: 20px;
        }

        /* Add this style for responsive tables */
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
        }

        /* Add this style to make the table headers sticky */
        .table thead th {
            position: sticky;
            top: 0;
            background-color: #27a8d0;
        }
        .navbar {
    background-color: #27a8d0;
    padding: 10px;
}

.nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
    // background-color: #27a8d0;
    color: black;
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

.nav-item {
    display: inline-block;
    margin-right: 20px;
}

.nav-item a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.nav-item a:hover {
    color: #ff9900;
}

</style>


