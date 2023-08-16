@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Loans', 'activeButton' => 'laravel'])
@section('content')
    <div class="content" >

        <div style="display: flex; justify-content: space-around">
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
            <a href=""><p style = "color: white">ACCEPTED</p></a>
                <p style = "color: white">{{ $accepted }}</p>
                
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px;border-radius: 10px;">
                <p style = "color: white">PENDING</p>
                <p style = "color: white">{{ $pending }}</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:#27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">SHORTLISTED </p>
                <p style = "color: white">{{ $shortlisted }}</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
                <p style = "color: white">DISAPPROVED</p>
                <p style = "color: white">{{ $disapproved }}</p>
            </div>
        </div>
        <div class="card-body table-full-width table-responsive">
             <h3 style="color: green; text-align: center;">LOAN REQUESTS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>    
            <th>Status
            
            </th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->application_number }}</td>
                <td>{{ $loan->amount }}</td>
               
                <td>
                    <form action = "{{ route('submit_form') }}"  method ="post">
                        @csrf
                        <input type="hidden" id="id" name="loan_id" value="{{ $loan->application_number }}">
                        <select name="loan_req" id="loan" onchange = 'this.form.submit()'>
                            <option value="{{ $loan->request_status }}">{{ $loan->request_status }}</option>
                            <option value="APPROVED">Approve</option>
                            <option value="DISAPPROVED">Disapprove</option>
                        </select>
                    </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>

        <div class="container-fluid" style="margin-top:50px">
            
            <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "loanStatusChart" style="width: 500px; height: 350px;"></canvas>
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

            <!-- Table -->
            <div class="card-body table-full-width table-responsive">
             <h3 style="color: green; text-align: center;">LOANS</h3>
     <table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Status</th>
            <th>Installments</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->application_number }}</td>
                <td>{{ $loan->amount }}</td>
                <td>{{ $loan->start_date }}</td>
                <td>{{ $loan->end_date }}</td>
                <td>{{ $loan->request_status }}</td>
                <td>
                    @if ($loan->installments->count() > 0)
                        <ul>
                            @foreach ($loan->installments as $installment)
                                <li>
                                    Installment {{ $installment->installment_count }}: {{ $installment->installment_amount }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        No installments
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>
            

           
    </div>
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
        var ctx = document.getElementById('approvedRejectedPieChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Approved', 'Rejected'],
                datasets: [{
                    data: [{{ $approved }}, {{ $rejected }}], 
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

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush  

