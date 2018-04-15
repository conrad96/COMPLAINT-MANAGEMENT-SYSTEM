<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" >
<link rel="stylesheet" type="text/css" href="../css/main.css">
	<title></title>
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
<div id="navigation" >
<ul class="nav nav-tabs">
	 <li class="active"><a href=<?php echo "admin_view.php?aid=$aid";?>>Dashboard</a> </li>
	 <li><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li><a href=<?php echo "admin_report.php?aid=$aid";?>>Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>
 </ul>
</div>   
		  <div id="about" class="well">
	<?php echo "<h3>ADMINISTRATOR:  {$str_fetch['sys_fname']}</h3>";
	?>
		</div></td>
	 
	 		<table class="table">
<tr>
					<td> <div id="div1" >
					  <h4 class="well">Complainants Emails:</h4><p>
						<?php 
$ref="SELECT * FROM complainants";
$ref_query=mysqli_query($connection,$ref);
while($ref_fetch=mysqli_fetch_array($ref_query)){
	echo "{$ref_fetch['email']} <p>";
}
						?>
					</div></td>

					<td><div id="div2" >
					<h4 class="well">Staff Getting Complaints</h4><p>
					<?php
$staff="SELECT * FROM complaints";	
$staff_query=mysqli_query($connection,$staff);
while($ref_fetch2=mysqli_fetch_array($staff_query)){
	$id=$ref_fetch2['staff_ID'];
	$name="SELECT * FROM staff WHERE staff_ID='$id' ";
	$name_query=mysqli_query($connection,$name);
	while($name_fetch=mysqli_fetch_array($name_query)){
	echo "<h5>{$ref_fetch2['staff_ID']} -> {$name_fetch['staff_fname']}&nbsp;{$name_fetch['staff_lname']}<h5><p>";	
	}
	
}
					  ?>
					</div> </td>

					<td> <div id="div3" >
					<h4 class="well">Online Help Staff</h4><p>
						<?php 
$online="SELECT * FROM staff";
$online_query=mysqli_query($connection,$online);
while($online_fetch=mysqli_fetch_array($online_query)){
	if($online_fetch['logout_time']==""){
	echo "<ul>";
	echo "<li>{$online_fetch['staff_fname']}</li>";
	echo "</ul>";
	}
}						?>
					</div> </td>
					 
				 
				
	</tr>		</table>
			
		 
	 
</div> 
 
 
<?php }else{header("location: login.php");}}else{header("location: login.php");}?>
</body>
</html>