@extends('layouts.app', ['activePage' => 'upgrade', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'SignOut', 'activeButton' => 'laravel'])

@section('content')
    <!-- <div class="content">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title">{{ __('Light Bootstrap Dashboard')}}</h4>
                                    <p class="category">{{ __('Are you looking for more components? Please check our Premium Version of Light Bootstrap Dashboard Laravel.')}}</p>
                                    <br>
                                </div>
                                <div class="content table-responsive table-upgrade">
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th class="text-center">{{ __('Free')}}</th>
                                            <th class="text-center">{{ __('PRO')}}</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><h3 class="mb-0 mt-0">Laravel</h3></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr>
                                                <td>Login, Register, Forgot password pages</td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>User profile</td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Users management</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>User roles management </td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Items management </td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Categories management, Tags management </td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Image upload, date picker inputs</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Radio button, checkbox, toggle inputs</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td><h3 class="mb-0 mt-0">Frontend</h3></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Components')}}</td>
                                                <td>{{ __('16')}}</td>
                                                <td>{{ __('115+')}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Plugins')}}</td>
                                                <td>{{ __('4')}}</td>
                                                <td>{{ __('14+')}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Example Pages')}}</td>
                                                <td>{{ __('7')}}</td>
                                                <td>{{ __('22+')}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('SASS Files')}}</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Login/Register/Lock Pages')}}</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Premium Support')}}</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>{{ __('Free')}}</td>
                                                <td>{{ __('Just $149')}}</td>
                                            </tr>
                                            <tr class="last-row">
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-round btn-fill btn-default disabled">{{ __('Current Version')}}</a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro-laravel" class="btn btn-round btn-fill btn-info">{{ __('Upgrade to PRO') }}</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

  
    <?php
// Start the session
session_start();

// Check if the user is signed in or not
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === true) {
    // If user is signed in
    if (isset($_GET['action']) && $_GET['action'] === 'sign_out') {
        // Simulate sign-out
        $_SESSION['signed_in'] = false;
        header('Location: index.php');
        exit();
    }
} else {
    // If user is not signed in, simulate sign-in
    $_SESSION['signed_in'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin: 100px auto;
            max-width: 400px;
            border: 1px solid #ccc;
            padding: 20px;
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the user is signed in or not
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === true) {
            // If user is signed in
            echo '<h1>Welcome!</h1>';
            echo '<p>You are signed in.</p>';
            echo '<a href="?action=sign_out">Sign Out</a>';
        } else {
            // If user is not signed in
            echo '<h1>Not Signed In</h1>';
            echo '<p>Click the button below to sign in:</p>';
            echo '<a href="?action=sign_out">Sign In</a>';
        }
        ?>
    </div>
</body>p
</html>


    
    



    
<!-- @endsection -->