@extends('layouts.app', ['activePage' => 'maps', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Claims', 'activeButton' => 'laravel'])

@section('content')
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
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
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</body>
</html>

    <!-- <div class="map-container">
        <div id="map"></div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initGoogleMaps();

        });
    </script>
@endpush -->


