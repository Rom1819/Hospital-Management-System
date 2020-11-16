<?php
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['search_staff'])){
  $id=$_POST['id'];
 $query="select * from staff where id='$id';";
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
  <center><h3>Staff Details</h3></center><br>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>Sex</th>
      <th>Marital Status</th>
	  <th>Staff Id</th>
      <th>Staff Name</th>
      <th>Contact</th>
      <th>Blood Group</th>
      <th>Shift</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $sex=$row['sex'];
	$marriage=$row['marriage'];
	$id=$row['id'];
	$name=$row['name'];
    $contact=$row['contact'];
    $bgroup=$row['bgroup'];
    $shift=$row['shift'];
    echo '<tr>
      <td>'.$sex.'</td>
      <td>'.$marriage.'</td>
	  <td>'.$id.'</td>
      <td>'.$name.'</td>
	  <td>'.$contact.'</td>
      <td>'.$bgroup.'</td>
      <td>'.$shift.'</td>
    </tr>';
  }
echo '</tbody></table><hr></div> 

<br>
<div class="row">
  <div class="col-md-4">
	<form class="form-group" method="post" action="view_staff.php">
		<input type="submit" name="view_staff" value="View Staffs List" class="btn btn-primary">
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