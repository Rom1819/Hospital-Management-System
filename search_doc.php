<?php
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['search_doc'])){
  $reg=$_POST['reg'];
 $query="select * from doctb where reg='$reg';";
 $result=mysqli_query($con,$query);
 echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body style="background-color:#319D5A;color:white;text-align:center;padding-top:50px;">
  <div class="container" style="text-align:left;">
  <center><h3>Doctor Details</h3></center><br>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>Doctors Name</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Blood Group</th>
      <th>Registration No.</th>
      <th>Specialisation</th>
      <th>Appointent Time</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $name=$row['name'];
    $contact=$row['contact'];
    $email=$row['email'];
    $bgroup=$row['bgroup'];
    $reg=$row['reg'];
    $special=$row['special'];
    $time=$row['time'];
    echo '<tr>
      <td>'.$name.'</td>
      <td>'.$contact.'</td>
      <td>'.$email.'</td>
      <td>'.$bgroup.'</td>
      <td>'.$reg.'</td>
      <td>'.$special.'</td>
      <td>'.$time.'</td>
    </tr>';
  }
echo '</tbody></table><hr></div> 

<br>
<div class="row">
  <div class="col-md-4">
	<form class="form-group" method="post" action="view_doc.php">
		<input type="submit" name="view_doc" value="View Doctors List" class="btn btn-primary">
	</form>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
	<form class="form-group" method="post" action="admin-panel.php">
		<input type="submit" value="Go Back" class="btn btn-primary">
	</form>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>';
}

?>