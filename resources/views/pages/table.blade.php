@extends('layouts.app', ['activePage' => 'table', 'title' => 'Uprise Sacco', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
    <!DOCTYPE html>
<html>
<head>
  <title>Register Button</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    #registerButton {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
    #registerButton:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

<button id="registerButton">Register Member</button>

<script>
document.getElementById("registerButton").addEventListener("click", function() {
  // Add your registration logic here
  alert("Registration successful!");
});
</script>

</body>
</html>


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
                                    <th>Deposits</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jjumba Benjs</td>
                                        <td>5,300,000</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Loor Jacobson</td>
                                        <td>4,000,000</td>
                                        <td>Inactive</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Ayiko Mark</td>
                                        <td>3,900,000</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Naka Mary</td>
                                        <td>3,820,000</td>
                                        <td>Inactive</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mutebi Paul</td>
                                        <td>3,720,000</td>
                                        <td>Inactive</td>
                                     </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kigwana Emma</td>
                                        <td>3,650,000</td>
                                        <td>Active</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Katumba Peter</td>
                                        <td>3,590,000</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Murungi Ali</td>
                                        <td>2,300,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Nampima Betty</td>
                                        <td>2,200,000</td>
                                        <td>Inactive</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Ederu Richard</td>
                                        <td>2,110,000</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Ariho George</td>
                                        <td>2,00,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Kibirenge Shid</td>
                                        <td>1,950,000</td>
                                        <td>Inactive</td>
                                     </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Mutumba Samson</td>
                                        <td>1,850,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Nakiwala Rose</td>
                                        <td>1,650,000</td>
                                        <td>Inactive</td>
                                     </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Nagawa Sarah</td>
                                        <td>1,450,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Kayizi Benard</td>
                                        <td>1,330,000</td>
                                        <td>Inactive</td>
                                     </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Naliso Jerih</td>
                                        <td>1,200,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Assimwe Sherry</td>
                                        <td>1,110,000</td>
                                        <td>Inactive</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Kiwanda Andrew</td>
                                        <td>100,000</td>
                                        <td>Active</td>
                                     </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Akiki Moses</td>
                                        <td>800,000</td>
                                        <td>Inactive</td>
                                     </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>Ajiko Edward</td>
                                        <td>650,000</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>22</td>
                                        <td>Mbabazi Aisha</td>
                                        <td>350,000</td>
                                        <td>Active</td>
                                        
                                    </tr>
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
<!-- @endsection -->