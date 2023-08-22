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
    <div class="content" style = "height:100px">
    
            <div style="display: flex; justify-content: space-around">
                <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
                     <a href=""><p style = "color: white">Applied Loan</p></a>
                    <p style = "color: white">{{  $shortlisted }}</p>
                
                </div>
                <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
                    <p style = "color: white">Sanctioned Loan</p>
                   <p style = "color: white">{{ $approved }}</p>
                </div>
               <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px; border-radius: 10px;">
                     <p style = "color: white">Disbursed Loan</p>
                   <p style = "color: white">{{$disbursedLoans }}</p>
                </div>
                <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
                     <p style = "color: white">Recovered Loans</p>
                    <p style = "color: white">{{ $recoveredLoans}}</p>
                </div>
           </div>   
     

 

    <div class="container-fluid" style="margin-top:50px">
            
            <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "Reject/AcceptChart" style="width: 500px; height: 300px;"></canvas>
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
    <div class="card-body table-full-width table-responsive" style=" background-color:#27a8d0; padding:5px; border-radius:20px">
            <h3 style="color: white; text-align: center;">LOANS IN PROGRESS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>Date</th>
            <th>Member</th>
            <!-- <th>LoanID</th> -->
            <th>Amount</th> 
            <th>Interest</th> 
            <th>Installments</th>
            <th>Total payment</th>
            <th>Amount per Installment</th>  
            <th>Status</th> 
        </tr>
    </thead>
    <tbody>
        
    @foreach ($loans as $loan)
            <tr>
                <td> {{$loan-> start_date}}</td>
         <td>{{ $loan->application_number }}</td>
         <td>{{ $loan->amount }}</td>
         <td>{{$loan -> payment_period}}</td>
         <td>{{}}</td>
                 
            </tr>
        @endforeach
           
           
            
        
    </tbody>
</table>

            
</div>
           
</div>
<script type="text/javascript" src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <script>
        var ctx = document.getElementById('approvedRejectedPieChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['less than 50%', 'Above 50%'],
                datasets: [{
                    data: [20,30], 
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            maintainAspectRatio: false
            }
        });
    </script>

<script>
        var ctx = document.getElementById('Reject/AcceptChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Accept', 'Reject'],
                datasets: [{
                    data: [20,30], 
                    backgroundColor: ['rgba(54, 162, 235, 1)', 'rgba(153, 102, 255, 1)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            maintainAspectRatio: false
            }
        });
    </script>
    <script type="text/javascript">
        var ctx = document.getElementById('loanStatusChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(['Applied', 'Sanctioned', 'Disbursed', 'Recovered']) !!},
                datasets: [{
                    label: 'Loan Status',
                    data: {!! json_encode([ 40,50, 60, 100]) !!},
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        '
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)',
                        
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                    
                }
                
            }
        });
    </script>
    <script type="text/javascript" src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} ); 

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
    color: #27a8d0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

.nav-item {
    display: inline-block;
    margin-right: 20px;
}
.nav-item.active a{
    color: orange;
}

.nav-item a {
    text-decoration: none;
    color: #27a8d0;
    font-weight: bold;
}

.nav-item a:hover {
    color: #ff9900;
}

</style>


