<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin-panel.php");
	}
	else
		header("Location:error.php");
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}
function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
	if($result)
		header("Location:func.php");
}
if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$bgroup=$_POST['bgroup'];
	$reg=$_POST['reg'];
	$special=$_POST['special'];
	$time=$_POST['time'];
	$query="insert into doctb(name,contact,email,bgroup,reg,special,time)values('$name','$contact','$email','$bgroup','$reg','$special','$time')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
if(isset($_POST['nurse_sub']))
{
	$id=$_POST['id'];
	$marriage=$_POST['marriage'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$bgroup=$_POST['bgroup'];
	$shift=$_POST['shift'];
	$query="insert into nurse(id,marriage,name,contact,bgroup,shift)values('$id','$marriage','$name','$contact','$bgroup','$shift')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:add_nurse.php");
}
if(isset($_POST['staff_sub']))
{
	$sex=$_POST['sex'];
	$marriage=$_POST['marriage'];
	$id=$_POST['id'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$bgroup=$_POST['bgroup'];
	$shift=$_POST['shift'];
	$query="insert into staff(sex,marriage,id,name,contact,bgroup,shift)values('$sex','$marriage','$id','$name','$contact','$bgroup','$shift')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:add_staff.php");
}
if(isset($_POST['prof_sub']))
{
	$sex=$_POST['sex'];
	$id=$_POST['id'];
	$desig=$_POST['desig'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$bgroup=$_POST['bgroup'];
	$query="insert into prof(sex,id,desig,name,contact,email,bgroup)values('$sex','$id','$desig','$name','$contact','$email','$bgroup')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:add_prof.php");
}
if(isset($_POST['stu_sub']))
{
	$sex=$_POST['sex'];
	$batch=$_POST['batch'];
	$id=$_POST['id'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$gcontact=$_POST['gcontact'];
	$email=$_POST['email'];
	$bgroup=$_POST['bgroup'];
	$query="insert into stu(sex,batch,id,name,contact,gcontact,email,bgroup)values('$sex','$batch','$id','$name','$contact','$gcontact','$email','$bgroup')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:add_stu.php");
}
if(isset($_POST['del_app']))
{
	$contact=$_POST['contact'];
	$query="delete from appointmenttb where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:del_app.php");
}
if(isset($_POST['remove_doc']))
{
	$reg=$_POST['reg'];
	$query="delete from doctb where reg='$reg';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:remove_doc.php");
}
if(isset($_POST['remove_nurse']))
{
	$id=$_POST['id'];
	$query="delete from nurse where id='$id';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:remove_nurse.php");
}
if(isset($_POST['remove_staff']))
{
	$id=$_POST['id'];
	$query="delete from staff where id='$id';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:remove_staff.php");
}
if(isset($_POST['remove_prof']))
{
	$id=$_POST['id'];
	$query="delete from prof where id='$id';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:remove_prof.php");
}
if(isset($_POST['remove_stu']))
{
	$id=$_POST['id'];
	$query="delete from stu where id='$id';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:remove_stu.php");
}
if(isset($_POST['back']))
{
	header("Location:admin-panel.php");
}
function display_admin_panel(){
	echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Monowara Sikder Medical College & Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter contact number" aria-label="Search" name="contact" required>
      <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px; background-color:#319D5A;">
 <div class="jumbotron" id="ab1"></div>
   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
  <center><h2 id="hs" >Hospital Section</h2></center>
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>
	  <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">View Appointments</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Payment Status</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>
      <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Doctors List</a>
	  <hr><hr>
	  <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-nurse" role="tab" aria-controls="settings">Nurse</a>
	  <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-staff" role="tab" aria-controls="settings">Staff</a>
	  <hr><hr>
	  <center><h2 id="hs">College Section</h2></center><br>
	  <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-prof" role="tab" aria-controls="settings">Teachers</a>
	  <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-stu" role="tab" aria-controls="settings">Students</a>
    </div><br><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an Appointment</h4></center><br>
              <form class="form-group" method="post" action="appointment.php">
                <div class="row">
                  <div class="col-md-4"><label>First Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="fname" required></div><br><br>
                  <div class="col-md-4"><label>Last Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="lname" required></div><br><br>
				  <div class="col-md-4"><label>Blood Group :</label></div>
				  <div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div><br><br>
                  <div class="col-md-4"><label>Email id:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="email" required></div><br><br>
                  <div class="col-md-4"><label>Contact Number:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="contact" required></div><br><br>
                  <div class="col-md-4"><label>Doctor:</label></div>
                  <div class="col-md-8">
                   <select name="doctor" class="form-control" >
                    <option value="Dr. Ruman Mahamud">Dr. Ruman Mahamud</option>
					<option value="Dr. Sanchita Mukherjee">Dr. Sanchita Mukherjee</option>
					<option value="Dr. Abid Hasan">Dr. Abid Hasan</option>
                    <option value="Dr. Israt Noor">Dr. Israt Noor</option>
                    <option value="Dr. Nigahe Mokarram">Dr. Nigahe Mokarram</option>
					
                    <!--	<?php display_docs();?>	-->
                    </select>
                  </div><br><br>
                  <div class="col-md-4"><label>Payment:</label></div>
                  <div class="col-md-8">
                    <select name="payment" class="form-control" >
                      <option value="Paid">Paid</option>
                      <option value="Pay later">Pay later</option>
                    </select>
					<hr>
					</div>
					<br><hr>
                  <div class="col-md-4">
                    <input type="submit" name="entry_submit" value="Create New Entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-4"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
	  <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
		<div class="card" >
			<div class="card-body" >
				<div class="row" >
					<div class="col-md-12">
						<form class="form-group" method="post" action="func.php">
						<label><h4>Cancel an Appointment :</h4></label>
						<input type="text" name="contact" style="font-size:18px" placeholder="Enter the contact to cancel appointment" class="form-control" required>
						<br>
						<input type="submit" name="del_app" value="Cancel Appointment" class="btn btn-primary">
						</form><br>
						<hr>
					</div>	
				</div>
			<div class="row" >
				<div class="col-md-4">
					<form class="form-group" method="post" action="view_all.php">
						<input type="submit" name="view_all" value="View Patients List" class="btn btn-primary">
					</form>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-3">
					<form class="form-group" method="post" action="func.php">
						<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
		</div>
	  </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card" >
          <div class="card-body" >
            <form class="form-group" method="post" action="func.php">
				<label><h4>Update Payment : </h4></label>
				<input type="text" name="contact" class="form-control" style="font-size:18px" placeholder="Enter contact" required><br>
				<select name="status" class="form-control">
					<option value="paid">paid</option>
					<option value="pay later">pay later</option>
				</select><br><hr>
				<input type="submit" value="update" name="update_data" class="btn btn-primary">
            </form>
          </div>
        </div><br><br>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <div class="card" >
			<div class="card-body" >
				<center><h4>Include a Doctor</h4></center><br>
				<form class="form-group" method="post" action="func.php">
				<div class="row">
					<div class="col-md-4"><label>Name :</label></div>
					<div class="col-md-8"><input type="text" name="name" style="font-size:18px" placeholder="Enter doctors name" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Contact Number :</label></div>
					<div class="col-md-8"><input type="text" name="contact" style="font-size:18px" placeholder="Enter doctors contact" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Email :</label></div>
					<div class="col-md-8"><input type="text" name="email" style="font-size:18px" placeholder="Enter doctors email" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Blood Group :</label></div>
					<div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div>
					<br>
					<div class="col-md-4"><label>Registration No :</label></div>
					<div class="col-md-8"><input type="text" name="reg" style="font-size:18px" placeholder="Enter doctors registration no." class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Specialist :</label></div>
					<div class="col-md-8"><input type="text" name="special" style="font-size:18px" placeholder="Enter area of Specialisation" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Appointment Time :</label></div>
					<div class="col-md-8">
					<select name="time" class="form-control" >
						<option value="05:00 PM - 08:00 PM">05:00 PM - 08:00 PM</option>
						<option value="06:00 PM - 09:00 PM">06:00 PM - 09:00 PM</option>
						<option value="07:00 PM - 10:00 PM">07:00 PM - 10:00 PM</option>
					</select><hr>
					</div>
					<br><hr>
					<div class="col-md-4">
					<input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
					</div>
					<div class="col-md-8"></div>
				</div>
				</form>
				</div>
		</div>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">
		<div class="card" >
			<div class="card-body" >
				<div class="row" >
			<div class="col-md-12">
				<form class="form-group" method="post" action="search_doc.php">
					<label><h4>Search a Doctor :</h4></label>
					<input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter doctors registration no." aria-label="Search" name="reg" required>
					<br>
					<input type="submit" name="search_doc" value="Search" class="btn btn-primary"><br>
					<br>
				</form>	
				<form class="form-group" method="post" action="func.php">
					<label><h4>Remove a Doctor :</h4></label>
					<input type="text" name="reg" style="font-size:18px" placeholder="Enter doctors registration no." class="form-control" required>
					<br>
					<input type="submit" name="remove_doc" value="Remove" class="btn btn-primary">
				</form><br>
				<hr>
			
			</div>	
		</div>
		<div class="row" >
		<div class="col-md-4">
			<form class="form-group" method="post" action="view_doc.php">
				<input type="submit" name="view_doc" value="View Doctors List" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-3">
			<form class="form-group" method="post" action="func.php">
				<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
			</form>
	   </div>
    </div>
			</div>
		</div>
	</div>
		<div class="tab-pane fade" id="list-nurse" role="tabpanel" aria-labelledby="list-attend-list">
        <div class="card" >
			<div class="card-body" >
				<center><h4>Include a Nurse</h4></center><br>
				<form class="form-group" method="post" action="func.php">
				<div class="row">
					<div class="col-md-4"><label>Id Number :</label></div>
					<div class="col-md-8"><input type="text" name="id" style="font-size:18px" placeholder="Enter nurse id number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Marital Status :</label></div>
					<div class="col-md-8">
					<select name="marriage" class="form-control" >
						<option value="Unmarried">Unmarried</option>
						<option value=Married">Married</option>
					</select>
					</div>
					<br>
					<div class="col-md-4"><label>Name :</label></div>
					<div class="col-md-8"><input type="text" name="name" style="font-size:18px" placeholder="Enter the name" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Contact Number :</label></div>
					<div class="col-md-8"><input type="text" name="contact" style="font-size:18px" placeholder="Enter the contact number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Blood Group :</label></div>
					<div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div>
					<br>
					<div class="col-md-4"><label>Working Shift :</label></div>
					<div class="col-md-8">
					<select name="shift" class="form-control" >
						<option value="Day">Day</option>
						<option value="Night">Night</option>
					</select>
					<hr>
					</div>
					<br><br>
					<div class="col-md-4">
					<input type="submit" name="nurse_sub" value="Add Nurse" class="btn btn-primary">
					</div>
					<div class="col-md-8"></div>
					</form>
					<div class="col-md-12">
				<form class="form-group" method="post" action="search_nurse.php"><br>
					<label><h4>Search a Nurse :</h4></label>
					<input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter nurse id number" aria-label="Search" name="id" required>
					<br>
					<input type="submit" name="search_nurse" value="Search" class="btn btn-primary"><br>
					<br>
				</form>	
				<form class="form-group" method="post" action="func.php">
					<label><h4>Remove a Nurse :</h4></label>
					<input type="text" name="id" style="font-size:18px" placeholder="Enter nurse id number" class="form-control" required>
					<br>
					<input type="submit" name="remove_nurse" value="Remove" class="btn btn-primary">
				</form><hr>
			</div>	
			<div class="col-md-4">
			<form class="form-group" method="post" action="view_nurse.php">
				<input type="submit" name="view_nurse" value="View Nurse List" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-3">
			<form class="form-group" method="post" action="func.php">
				<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
			</form>
	   </div>
				</div>
				
				</div>
		</div>
      </div>
	  <div class="tab-pane fade" id="list-staff" role="tabpanel" aria-labelledby="list-attend-list">
        <div class="card" >
			<div class="card-body" >
				<center><h4>Include a Staff</h4></center><br>
				<form class="form-group" method="post" action="func.php">
				<div class="row">
					<div class="col-md-4"><label>Sex :</label></div>
					<div class="col-md-8">
					<select name="sex" class="form-control" >
						<option value="Male">Male</option>
						<option value=Female">Female</option>
					</select>
					</div>
					<br>
					<div class="col-md-4"><label>Marital Status :</label></div>
					<div class="col-md-8">
					<select name="marriage" class="form-control" >
						<option value="Unmarried">Unmarried</option>
						<option value=Married">Married</option>
					</select>
					</div>
					<br>
					<div class="col-md-4"><label>Id Number :</label></div>
					<div class="col-md-8"><input type="text" name="id" style="font-size:18px" placeholder="Enter staff id number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Name :</label></div>
					<div class="col-md-8"><input type="text" name="name" style="font-size:18px" placeholder="Enter the name" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Contact Number :</label></div>
					<div class="col-md-8"><input type="text" name="contact" style="font-size:18px" placeholder="Enter the contact number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Blood Group :</label></div>
					<div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div>
					<br>
					<div class="col-md-4"><label>Working Shift :</label></div>
					<div class="col-md-8">
					<select name="shift" class="form-control" >
						<option value="Day">Day</option>
						<option value=Night">Night</option>
					</select>
					<hr>
					</div>
					<br><br>
					<div class="col-md-4">
					<input type="submit" name="staff_sub" value="Add Staff" class="btn btn-primary">
					</div>
					<div class="col-md-8"></div>
				</form>
					<div class="col-md-12">
				<form class="form-group" method="post" action="search_staff.php"><br>
					<label><h4>Search a Staff :</h4></label>
					<input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter staff id number" aria-label="Search" name="id" required>
					<br>
					<input type="submit" name="search_staff" value="Search" class="btn btn-primary"><br>
					<br>
				</form>	
				<form class="form-group" method="post" action="func.php">
					<label><h4>Remove a Staff :</h4></label>
					<input type="text" name="id" style="font-size:18px" placeholder="Enter staff id number" class="form-control" required>
					<br>
					<input type="submit" name="remove_staff" value="Remove" class="btn btn-primary">
				</form><hr>
			</div>	
			<div class="col-md-4">
			<form class="form-group" method="post" action="view_staff.php">
				<input type="submit" name="view_staff" value="View Staff List" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-3">
			<form class="form-group" method="post" action="func.php">
				<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
			</form>
	   </div>
				</div>
				</div>
		</div>
      </div>
	  <div class="tab-pane fade" id="list-prof" role="tabpanel" aria-labelledby="list-attend-list">
        <div class="card" >
			<div class="card-body" >
				<center><h4>Include a Teacher</h4></center><br>
				<form class="form-group" method="post" action="func.php">
				<div class="row">
				<div class="col-md-4"><label>Sex :</label></div>
					<div class="col-md-8">
					<select name="sex" class="form-control" >
						<option value="Male">Male</option>
						<option value=Female">Female</option>
					</select>
					</div>
					<br>
				<div class="col-md-4"><label>Id Number :</label></div>
					<div class="col-md-8"><input type="text" name="id" style="font-size:18px" placeholder="Enter the id number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Designation :</label></div>
					<div class="col-md-8">
					<select name="desig" class="form-control" >
						<option value="Professor">Professor</option>
						<option value="Associate Professor">Associate Professor</option>
						<option value="Assistant Professor">Assistant Professor</option>
						<option value="Lecturer">Lecturer</option>
					</select>
					</div>
					<br>
					<div class="col-md-4"><label>Name :</label></div>
					<div class="col-md-8"><input type="text" name="name" style="font-size:18px" placeholder="Enter the name" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Contact Number :</label></div>
					<div class="col-md-8"><input type="text" name="contact" style="font-size:18px" placeholder="Enter the contact number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Email :</label></div>
					<div class="col-md-8"><input type="text" name="email" style="font-size:18px" placeholder="Enter the email id" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Blood Group :</label></div>
					<div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div>
					<br><br>
					<div class="col-md-4">
					<input type="submit" name="prof_sub" value="Add Teacher" class="btn btn-primary">
					</div>
					<div class="col-md-8"></div>
				</form>
					<div class="col-md-12">
				<form class="form-group" method="post" action="search_prof.php"><br>
					<label><h4>Search a Teacher :</h4></label>
					<input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter teachers id number" aria-label="Search" name="id" required>
					<br>
					<input type="submit" name="search_prof" value="Search" class="btn btn-primary"><br>
					<br>
				</form>	
				<form class="form-group" method="post" action="func.php">
					<label><h4>Remove a Teacher :</h4></label>
					<input type="text" name="id" style="font-size:18px" placeholder="Enter teachers id number" class="form-control" required>
					<br>
					<input type="submit" name="remove_prof" value="Remove" class="btn btn-primary">
				</form><hr>
			</div>	
			<div class="col-md-4">
			<form class="form-group" method="post" action="view_prof.php">
				<input type="submit" name="view_prof" value="View Teachers List" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-3">
			<form class="form-group" method="post" action="func.php">
				<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
			</form>
	   </div>
				</div>
				</div>
		</div>
      </div>
	  <div class="tab-pane fade" id="list-stu" role="tabpanel" aria-labelledby="list-attend-list">
        <div class="card" >
			<div class="card-body" >
				<center><h4>Include a Student</h4></center><br>
				<form class="form-group" method="post" action="func.php">
				<div class="row">
				<div class="col-md-4"><label>Sex :</label></div>
					<div class="col-md-8">
					<select name="sex" class="form-control" >
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					</div>
					<br>
					<div class="col-md-4"><label>Batch :</label></div>
					<div class="col-md-8"><input type="text" name="batch" style="font-size:18px" placeholder="Enter the batch number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Id Number :</label></div>
					<div class="col-md-8"><input type="text" name="id" style="font-size:18px" placeholder="Enter the id number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Name :</label></div>
					<div class="col-md-8"><input type="text" name="name" style="font-size:18px" placeholder="Enter the name" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Contact Number :</label></div>
					<div class="col-md-8"><input type="text" name="contact" style="font-size:18px" placeholder="Enter the contact number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Gurdians Contact :</label></div>
					<div class="col-md-8"><input type="text" name="gcontact" style="font-size:18px" placeholder="Enter the gurdians contact number" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Email :</label></div>
					<div class="col-md-8"><input type="text" name="email" style="font-size:18px" placeholder="Enter the email id" class="form-control" required></div>
					<br>
					<div class="col-md-4"><label>Blood Group :</label></div>
					<div class="col-md-8">
					<select name="bgroup" class="form-control" >
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select></div>
					<br><br>
					<div class="col-md-4">
					<input type="submit" name="stu_sub" value="Add Student" class="btn btn-primary">
					</div>
					<div class="col-md-8"></div>
					</form>
					<div class="col-md-12">
				<form class="form-group" method="post" action="search_stu.php"><br>
					<label><h4>Search a Student :</h4></label>
					<input class="form-control mr-sm-2" type="text" style="font-size:18px" placeholder="Enter students id number" aria-label="Search" name="id" required>
					<br>
					<input type="submit" name="search_stu" value="Search" class="btn btn-primary"><br>
					<br>
				</form>	
				<form class="form-group" method="post" action="func.php">
					<label><h4>Remove a Student :</h4></label>
					<input type="text" name="id" style="font-size:18px" placeholder="Enter students id number" class="form-control" required>
					<br>
					<input type="submit" name="remove_stu" value="Remove" class="btn btn-primary">
				</form><hr>
			</div>	
			<div class="col-md-4">
			<form class="form-group" method="post" action="view_stu.php">
				<input type="submit" name="view_stu" value="View Students List" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-3">
			<form class="form-group" method="post" action="func.php">
				<input type="submit" name="back" value="Go Back to Admin Panel" class="btn btn-primary">
			</form>
	   </div>
				</div>
				</form>
				</div>
		</div>
      </div>
  </div>
</div><br>
   </div>
   <br><hr><br>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>';
}
?>