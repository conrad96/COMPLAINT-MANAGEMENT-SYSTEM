 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
	<title></title>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
 
 <div id="wrapper">
<div id="header" class="header">
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
<ul class="nav nav-tabs">
<li><a href=<?php echo "admin_view.php?aid=$aid";?>>Dashboard</a> </li>
	 <li><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li class="active"><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li><a href=<?php echo "admin_report.php?aid=$aid";?>>Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>
</ul>
<div id="about" class="well">
	<?php echo "<h3>ADMIN : Update Account </h3><p>";
	?>
</div>
<table>
<tr>
<td><div id="wrap">
	<table class="table">
	<tr>
<td><div id="staff_details">
	<h4 class="well">Search Staff to  Update Profile</h4><p />
	<form action=<?php echo "admin_update.php?aid=$aid";?> method="POST">
	<table>
	<tr><td><label for="staffid">Staff ID:</label>&nbsp;<input type="text" name="staffid" id="staffid" required="required"></td></tr>
	<tr><td><input type="submit" name="search" value="Search"></td></tr>
	</table>
	</form>
	<?php 
if(isset($_POST['search'])){
$staffid=$_POST['staffid'];
$staff="SELECT * FROM staff WHERE staff_ID=$staffid";
$staff_query=mysqli_query($connection,$staff);
$staff_fetch=mysqli_fetch_array($staff_query);
if($staff_fetch){
	?>
<table class="table">
<tr><td><label class='label label-primary'>Staff ID:</label></td>
<td><?php echo "{$staff_fetch['staff_ID']}";?></td>
</tr>
<tr><td><label class='label label-primary'>Staff fname:</label></td>
<td><?php  echo "{$staff_fetch['staff_fname']}"; ?></td>
</tr>
<tr><td><label class='label label-primary'>Staff lname:</label></td>
<td><?php echo "{$staff_fetch['staff_lname']}";?></td>
</tr>
<tr><td><label class='label label-primary'>Department:</label></td>
<td><?php echo "{$staff_fetch['department']}";?></td>
</tr>
<!-- <tr><td><label>Password:</label></td>
<td><?php //echo "{$staff_fetch['password']}"; ?></td>
</tr>
 --></table><?php 
//header("location: admin_update.php?aid=$aid&sid=$staffid");
}else{ 
	$admin="SELECT * FROM sys_admin WHERE sys_ID=$staffid ";
	$admin_query=mysqli_query($connection,$admin);
	$admin_fetch=mysqli_fetch_array($admin_query);
if($admin_fetch){
echo "<table class='table'>";
echo "<tr><td><label class='label label-default'>Admin ID:</label></td>";
echo "<td> {$admin_fetch['sys_ID']}</td>";
echo "</tr>";
echo "<tr><td><label class='label label-default'>Admin fname:</label></td>";
echo "<td>{$admin_fetch['sys_fname']}</td>";
echo "</tr>";
echo "<tr><td><label class='label label-default'>Admin lname:</label></td>";
echo "<td>{$admin_fetch['sys_lname']}</td>";
echo "</tr>";
// echo "<tr><td><label>Password:</label></td>";
// echo "<td>{$admin_fetch['password']}</td>";
// echo "</tr>";
echo "</table>";
}else{ echo "<font color='RED'>Staff ID doesnot Exist</font>";}

	} }
?>
</div></td>
	<td>
	<div id="create_form">
	<form action=<?php echo "admin_update.php?aid=$aid"; ?> method="POST" role="form">
	<h4 class="well">Edit Staff Profile</h4>
	 <div class="form-group">
	 <label for="id">Staff ID:</label> 
	 <input type="text" name="id" id="id" required="required" class="form-control"> 
	 </div>
	 <div class="form-group">
	 <label for="cat">User Priviledge:</label>	

<select name="priviledge" id="cat" required="required" class="form-control">
	<option>Staff</option>
	<option>Admin</option>
</select> </div>
<div class="form-group">
 <label for="fname">First Name:</label> 
 <input type="text" name="fname" id="fname" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="lname">Last Name:</label> 
 <input type="text" name="lname" id="lname" required="required" class="form-control"> 
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
 </div>
 <div class="form-group">
 <label for="pass1">Password:</label> 
 <input type="password" name="pass1" id="pass1" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="pass2">Confirm Password:</label> 
 <input type="password" name="pass2" id="pass2" required="required" class="form-control"> 
 </div>
 <div class="form-group">
 <input type="submit" name="submit" value="Update" class="btn btn-deafult"> 
 </div>
</form>
	</div></td>
	</tr>
	</table>
</div> 
  
 <div id="footer"></div></td><td>&nbsp;</td>
 
</div>
 
 
 
<?php }}?>
<?php 
if(isset($_POST['submit'])){
	$id=$_POST['id'];
 $priviledge=$_POST['priviledge'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $dept=$_POST['department'];
 $password=$_POST['pass2'];
 $pass2=$_POST['pass2'];
 //$sid=$_GET['sid'];
 if($_POST['pass1']==$_POST['pass2']){
// if($priviledge='Staff'){goto staff;}else{goto admin;}
 	switch($priviledge){
case 'Staff':
 $create="UPDATE staff SET staff_ID=$id,staff_fname='$fname',department='$dept',password='$pass2',staff_lname='$lname' WHERE staff_ID=$id ";
$create_query=mysqli_query($connection,$create);
if($create_query){
	// header("location: admin_update.php?aid=$aid");
	echo "<script>alert('Update Success');</script>";
}else{echo "<font color='red'>Error !! Account Not Updated<p></font>";}
break;

case 'Admin':
$create="UPDATE sys_admin SET sys_ID='$id',sys_fname='$fname',password='$pass2',sys_lname='$lname' WHERE sys_ID=$id ";
$create_query=mysqli_query($connection,$create);
if($create_query){
	//header("location: admin_create.php?aid=$aid");
	echo "<script>alert('Update Success');</script>";
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