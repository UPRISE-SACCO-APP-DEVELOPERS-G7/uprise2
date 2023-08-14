@extends('layouts.app', ['activePage' => 'maps', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Claims', 'activeButton' => 'laravel'])

@section('content')

    <!-- <table>
        <thead>
            <tr>
                <th>Claim</th>
                <th>Member who made a claim</th>
                <th>Claim resolved with a reason</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Medical Expenses</td>
                <td>John Doe</td>
                <td>Approved - Valid medical receipt provided</td>
            </tr>
            <tr>
                <td>Car Accident</td>
                <td>Jane Smith</td>
                <td>Denied - No evidence of accident provided</td>
            </tr>
        
        </tbody>
    </table> -->

    <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Claim Description</th>
                                    <th>Status</th>
                                    <th>Membership Id</th>
                                    
                                </thead>
                                <tbody>
                                    @foreach($claims as $claim)
                                    <tr>
                                        <td>{{ $claim->id }}</td>
                                        <td>{{ $claim->description }}</td>
                                        <td>{{ $claim->status }}</td>
                                        <td>{{ $claim->member_id }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
    @endsection


 


