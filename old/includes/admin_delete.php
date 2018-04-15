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
	 <li><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li class="active"><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li><a href=<?php echo "admin_report.php?aid=$aid";?>>Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>

		</ul>
	</div>

<div id="about" class="well">
<?php 
	echo "<h3>ADMIN : Delete Account </h3><p>";
	?>
</div>
  <table class="table">
 <tr> <div id="staff_details">
<td>	<h4 class="well">Preview Staff Profile</h4><p />
	<form action=<?php echo "admin_delete.php?aid=$aid";?> method="POST" role="form">
	 <div class="form-group">
	 <label for="staffid">Staff ID:</label>&nbsp;<input type="text" name="staffid" id="staffid" required="required" class="form-control">  
	 <input type="submit" name="search" value="Search" class="btn btn-default" class="form-control">
	 </div>
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
<tr><td><label class="label label-default">Staff ID:</label></td>
<?php echo "<td>{$staff_fetch['staff_ID']}</td>";?></tr>
<tr><td><label class="label label-default">Staff fname:</label> </td> 
<?php  echo "<td>{$staff_fetch['staff_fname']}</td>"; ?></tr>
<tr><td><label class="label label-default">Staff lname:</label></td>
<?php echo "<td>{$staff_fetch['staff_lname']}</td>";?></tr>
<tr><td><label class="label label-default">Department:</label></td>
<?php echo "<td>{$staff_fetch['department']}</td>";?></tr>
 
</table><?php 
//header("location: admin_delete.php?did=$staffid");
//require_once("admin_delete.php?did=$staffid");
}else{ 
	$admin="SELECT * FROM sys_admin WHERE sys_ID=$staffid ";
	$admin_query=mysqli_query($connection,$admin);
	$admin_fetch=mysqli_fetch_array($admin_query);
if($admin_fetch){
echo "<table>";
echo "<tr><td><label class='label label-default'>Admin ID:</label></td>";
echo "<td> {$admin_fetch['sys_ID']}</td></tr>";
echo "<tr><td><label class='label label-default'>Admin fname:</td>";
echo "<td>{$admin_fetch['sys_fname']}</td></tr>";
echo "<tr><td><label class='label label-default'>Admin lname:</label></td>";
echo "<td>{$admin_fetch['sys_lname']}</td></tr>";
// echo "<tr><td><label class='label label-default'>Department:</label></td>";
// echo "<td>{$admin_fetch['department']}</td></tr>";
echo "<tr><td><label class='label label-default'>Password:</label></td>";
echo "<td>{$admin_fetch['password']}</td></tr>";
echo "</dl>";
}else{ echo "<font color='RED'>Staff ID doesnot Exist</font>";}

	} }
?>
</div></td>
<td>
<div id="form-right">
<form action=<?php echo "admin_delete.php?aid=$aid";?> method="POST" >
<table>
	<tr>
		<td><label for="id">Staff ID:</label></td>
		<td><input type="text" name="did" id="id" required="required"></td>
	</tr>
	<tr><td><label for="cat">Priviledge:</label></td>
<td><select name="category" id="cat" required="required"><option>
	Staff
</option>
<option>Admin</option>
</select></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>
<input type="submit" name="delete" value="Delete Account">		
	</td></tr>
</table>

</form> 
</div></td></tr>
</table>
<?php 
if(isset($_POST['delete'])){
	$id=$_POST['did'];
	$category=$_POST['category'];
	switch($category){
case 'Staff':
	$str="DELETE FROM staff WHERE staff_ID=$id";
	$str_query=mysqli_query($connection,$str);
	if($str_query){
		  echo "<script>alert('Delete Account Success');</script>";
	}else{echo "<script>alert('Delete Account Failed');</script>";}
	break;
case 'Admin':
$str="DELETE FROM sys_admin WHERE sys_ID=$id";
	$str_query=mysqli_query($connection,$str);
	if($str_query){
		echo "<script>alert('Delete Account Success');</script>";
	}else{echo "<script>alert('Delete Account Failed');</script>";}
	break;
	default:
	echo "<script>alert('Chooose priviledge ');</script>";
	break;
	}
}
?>
<!--
	<td><div id="create_form">
	<form action=<?php// echo "admin_update.php?aid=$aid"; ?> method="POST">
	<h4>Edit Staff Profile</h4>
	<table>
	<tr><td><label for="id">Staff ID:</label></td>
	<td><input type="text" name="id" id="id"></td></tr>
	<tr><td><label for="cat">User Priviledge:</label>	

<select name="priviledge" id="cat">
	<option>Staff</option>
	<option>Admin</option>
</select></td></tr>
<tr><td><label for="fname">First Name:</label></td>
<td><input type="text" name="fname" id="fname"></td>
</tr>
<tr>
<td><label for="lname">Last Name:</label></td>
<td><input type="text" name="lname" id="lname"></td>
</tr>
<tr>
<td><label for="dept">Department:</label></td>
<td><select id="dept" name="department">
	<option>Human Resource</option>
	<option>IT</option>
	<option>Finance</option>
	<option>Security</option>
	<option>Communication</option>
</select></td>
</tr>
<tr>
<td><label for="pass1">Password:</label></td>
<td><input type="password" name="pass1" id="pass1"></td>
</tr>
<tr>
<td><label for="pass2">Confirm Password:</label></td>
<td><input type="password" name="pass2" id="pass2"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Update"></td>
</tr>
</table>
</form>
	</div> --> 
	</tr>
	</table>
</div></td>
</tr>
<tr>
<td><div id="footer"></div></td><td>&nbsp;</td>
</tr>
</table>
</div>
</td>
<td>
	
</td>
</tr>
</table>
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
$create="UPDATE admin SET admin_ID='$id',admin_fname='$fname',password='$pass2',admin_lname='$lname',department='$dept' WHERE admin_ID=$id ";
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