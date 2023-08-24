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
            <h3 style="color: white; text-align: center;">DELINQUENT LOANS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>{{$member}}</th>
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
    font-weight: 600px;
    color: #ffb773;
    background: #fffaf5;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 5px;
}


</style>


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


