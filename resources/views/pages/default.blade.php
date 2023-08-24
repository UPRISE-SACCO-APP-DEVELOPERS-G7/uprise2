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
    
    <div class="row">
        <div class="col-md-10">
        <div class= "row">
        
        <div class="card-body table-full-width table-responsive" style="margin-top: 3px; margin-left: 4px; background-color:#27a8d0; padding:5px; border-radius:20px">
            <h3 style="color: white; text-align: center;">DEFAULTED LOANS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>Member</th>
             <th>Amount</th>
            <th>Installment Defaulted</th> 
            <th>Remaining installments</th>
            <th>Balance</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
            <tr>
                <td>Madrine</td>
         <td>300000</td>
         <td>4th</td>
         <td>2</td>
        <td>600000</td>
                 
            </tr>
        @endforeach
    </tbody>
</table>
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
            type: 'line',
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
        var ctx = document.getElementById('approvedRejectedPieChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Approved', 'Disapproved'],
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
    <script>
        var ctx = document.getElementById('DoughnutChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Approved', 'Disapproved'],
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


