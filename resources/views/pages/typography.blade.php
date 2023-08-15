@extends('layouts.app', ['activePage' => 'deposits', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Deposits', 'activeButton' => 'laravel'])

@section('content')





              
<div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Amount Deposited</th>
                                    <th>Name of Member</th>
                                    <th>Membership Id</th>
                                    
                                </thead>
                                <tbody>
                                    @foreach($deposits as $deposit)
                                    <tr>
                                    <td>{{ $deposit->receipt_number}}</td>
                                        <td>{{ $deposit->amount }}</td>
                                        <td>{{ $deposit->name }}</td>
                                        <td>{{ $deposit->member_id }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
    @endsection



       