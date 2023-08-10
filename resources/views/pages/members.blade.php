@extends('layouts.app', ['activePage' => 'table', 'title' => 'Uprise Sacco', 'navName' => 'Table List', 'activeButton' => 'laravel'])
  

@section("content")
<h2>Fill out the form below to register</h2>

@if($message!="")
<p>{{ $message }}</p>
@endif


<form id="registrationForm" method ="POST" action="/members">
    @csrf
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="username">Status:</label>
  <input type="text" id="status" name="status" required>

  <label for="username">Phone:</label>
  <input type="text" id="phone" name="phone" required>

  <label for="username">Membership Type:</label>
  <input type="text" id="membership type" name="membership_type" required>

  <button type="submit" id="registerButton">Register</button>
</form>


        <div class="container-fluid">
            <div class="row" style="margin-top:50px">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Membership Table</h4>
                            <p class="card-category">Here is a summary of the members and the deposits made plus their status</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->username }}</td>
                                        <td>{{ $member->status }}</td>
                                        <td>{{ $member->email }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Table on Plain Background</h4>
                            <p class="card-category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                    <th>City</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Doris Greene</td>
                                        <td>$63,542</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Mason Porter</td>
                                        <td>$78,615</td>
                                        <td>Chile</td>
                                        <td>Gloucester</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

  

    <script>
document.getElementById("registerButton").addEventListener("click", function() {
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  // You can perform validation and further processing here

//   alert("Registration successful!\nUsername: " + username + "\nEmail: " + email);
});
</script>
@endsection