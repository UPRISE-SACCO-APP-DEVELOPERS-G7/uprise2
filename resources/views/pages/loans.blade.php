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
    
        <div style="display: flex; justify-content: space-around">
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
            <a href=""><p style = "color: white">Applied</p></a>
                <p style = "color: white">{{  $shortlisted }}</p>
                
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
            <a href=""><p style = "color: white">Sanctioned</p></a>
                <p style = "color: white">{{ $approved }}</p>
                
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
                <p style = "color: white">Disapproved</p>
                <p style = "color: white">{{ $disapproved }}</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">Shortlisted</p>
                <p style = "color: white">{{ $shortlisted }}</p>
            </div>
            <!-- <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">DISAPPROVED</p>
                <p style = "color: white">{{ $disapproved }}</p>
            </div> -->
        </div>
    <div class="row" style= "margin-top: 50px">
        <div class="col-md-8" style = "width: 650px">
        <div class= "row">
        <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "loanStatusChart" style="width: 500px; height: 345px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "approvedRejectedPieChart" style="width: 500px; height: 190px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                </div>
        </div>
        <div class="card-body table-full-width table-responsive" style="margin-left: 4px; background-color:#27a8d0; padding:5px; border-radius:20px">
            <h3 style="color: white; text-align: center;">SHORTLISTED LOANS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>Date</th>
            <th>Member</th>
             <th>Amount</th>
            <th>Payment period</th> 
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
            @if ($loan->request_status == "SHORTLISTED")
                <tr>
                    <td>2023-11-17</td>
                    <td>{{ $loan->application_number }}</td>
                    <td>{{ $loan->amount }}</td>
                    <td>2</td>
                    
                    <td>
                        <form action="{{ route('submit_form') }}" method="post">
                            @csrf
                            <input type="hidden" id="id" name="loan_id" value="{{ $loan->application_number }}">
                            <select name="loan_req" id="loan" onchange="this.form.submit()">
                                <option value="{{ $loan->request_status }}">{{ $loan->request_status }}</option>
                                <option value="APPROVED">Approve</option>
                                <option value="REJECTED">Disapprove</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
    
</table>
</div>
        </div>
       <div class="col-md-3"  >
       <div class="card1" style = "width: 300px; background-color: #FFFFFF;">
                        <div class="card-body ">
                           <p>Applied loan Amount</p>
                           <div>
                            <h5 style= "color: #27a8d0"> Ugsh {{ $totalAppliedAmount}} </h5>
                           </div>
                         </div>
       </div>
       <div class="card1" style = "width: 300px; background-color: #FFFFFF; margin-top: 20px">
                        <div class="card-body ">
                           <p>Sanctioned  Amount</p>
                           <div>
                            <h5 style= "color: #27a8d0">Ugsh {{  $totalSanctionedAmount}}</h5>
                           </div>
                         </div>
       </div>
       <div class="card1" style = "width: 300px; background-color: #FFFFFF; margin-top: 20px">
                        <div class="card-body ">
                           <p>Disapproved Amount</p>
                           <div>
                            <h5 style= "color: #27a8d0">Ugsh {{ $disapprovedSum}}</h5>
                           </div>
                         </div>
                         
       </div>
      
       <div class="card1" style = "width: 300px; background-color: #FFFFFF; margin-top: 20px">
                        
                        <div class="card-body ">
                            <h6>Sanctioned Vs Disapproved</h6>
                            <div class="chart">
                            <canvas id= "DoughnutChart" style="width: 500px; height: 320px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
    </div>
           
</div>
<script type="text/javascript" src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('loanStatusChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(['Approved', 'Shortlisted', 'Disapproved', 'Pending', 'Accepted', 'Rejected']) !!},
                datasets: [{
                    label: 'Loan Status',
                    data: {!! json_encode([ $approved,$shortlisted, $disapproved, $pending, $accepted, $rejected]) !!},
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
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
    <script>
        var ctx = document.getElementById('DoughnutChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Sanctioned', 'Disapproved'],
                datasets: [{
                    data: [{{ $totalSanctionedAmount }}, {{ $disapprovedSum }}], 
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
         var ctx = document.getElementById('approvedRejectedPieChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Sanctioned', 'Disapproved'],
                datasets: [{
                    data: [{{ $approved }}, {{ $disapproved }}], 
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

.nav-item a {
    text-decoration: none;
    color: #27a8d0;
    font-weight: bold;
}

.nav-item a:hover {
    color: #ff9900;
}
.center button {
    padding: 10px 20px;
    font-size: 15px;
    font-weight: 600;
    color: #ffb773;
    background: #fffaf5;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 5px;
}


</style>


