 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
	<title></title>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

 <div id="wrapper">
<div id="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo"></td>
		<td><h1>BANK OF UGANDA</h1></td>
		</tr>
	</table>
</div>
	<?php 
if(isset($_GET['aid'])||$_POST['submit']){
include("database.php");
$aid=$_GET['aid'];
$str="SELECT * FROM sys_admin WHERE sys_ID=$aid ";
$str_query=mysqli_query($connection,$str);
$str_fetch=mysqli_fetch_array($str_query);
if($str_fetch){?>
<div id="navigation" class="nav">
		<ul class="nav nav-tabs">
			<li><a href=<?php echo "admin_view.php?aid=$aid";?>>Dashboard</a> </li>
	 <li class="active"><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li><a href=<?php echo "admin_report.php?aid=$aid";?>>Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>

		</ul>
	</div>


<div id="about" class="well">
 <?php
	echo "<h3>ADMIN : Create Account </h3>";
	?>
</div>
 
	 
	 
	 <div id="create_form" class="col-md-4">
	<form action=<?php echo "admin_create.php?aid=$aid"; ?> method="POST" role="form">
	 <!-- <div class="form-group">
	  <label for="id">Staff ID:</label> 
	 <input type="text" name="id" id="id" required="required" class="form-control"> 
	 </div> -->
	 <div class="form-group"> 
	 <label for="cat">User Priviledge:</label>	
<select name="priviledge" id="cat" class="form-control">
	<option>Staff</option>
	<option>Admin</option>
</select> 
</div>
<div class="form-group">
 <label for="fname">First Name:</label> 
 <input type="text" name="fname" id="fname" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="lname">Last Name:</label> 
 <input type="text" name="lname" id="lname" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="email">Email:</label> 
 <input type="email" name="email" id="email" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="dept">Department:</label> 
 <select id="dept" name="department" required="required" class="form-control">
	<option>Human Resource</option>
	<option>IT</option>
	<option>Finance</option>
	<option>Security</option>
	<option>Communication</option>
</select> 
 </div> <div class="form-group">
  <label for="pass1">Password:</label></td>
 <input type="password" name="pass1" id="pass1" required="required" class="form-control"> 
 </div>
 <div class="form-group">
  <label for="pass2">Confirm Password:</label> 
 <input type="password" name="pass2" id="pass2" required="required" class="form-control"> 
  </div>
  <div class="form-group">
 <input type="submit" name="submit" value="Create" class="btn btn-default"> 
 </div>
 
</form>

	</div> 
	 
	 
</div> 
<div id="footer"></div> 
<?php }}?>
<?php 
if(isset($_POST['submit'])){
	//$id=$_POST['id'];
 $priviledge=$_POST['priviledge'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $dept=$_POST['department'];
 $password=$_POST['pass2'];
 $pass2=$_POST['pass2'];
 $email=$_POST['email'];
 $aid=$_GET['aid'];
 if($_POST['pass1']==$_POST['pass2']){
// if($priviledge='Staff'){goto staff;}else{goto admin;}
 	switch($priviledge){

case 'Staff':
$lout="00:00:00";
$lin="00:00:00";
$pass3=md5($pass2);
 $create="INSERT INTO staff VALUES('','$fname','$dept','$pass3','$lname','$lin','$lout','$aid','$email') ";
$create_query=mysqli_query($connection,$create);
if($create_query){
	//header("location: admin_create.php?aid=$aid");
	echo "<font color='green'>Account Created Successfully</font>";
}else{echo "<font color='red'>Error !! Account Not Created<p></font>";}
break;

case 'Admin':
$pass3=md5($pass2);
$create="INSERT INTO sys_admin VALUES('','$fname','$lname','$pass3')";
$create_query=mysqli_query($connection,$create);
if($create_query){
	//header("locaton: admin_create.php?aid=$aid");
	echo "<font color='green'>Account Created Successfully</font>";
}else{echo "<font color='red'>Error !! Account Not Created<p></font>";}
break;

default:
echo "<font color='red'>Choose Priviledge Mode</font>";
break;
}
}else {echo "<font color='red'>Passwords Dont Match, Try Again</font>";}
}
?>
</body>
</html>