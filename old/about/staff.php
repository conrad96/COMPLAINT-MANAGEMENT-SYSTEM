<html>
<head>
<link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'>
<script src='../js/bootstrap.min.js'></script>
</head>
<body>
<div id="header" class="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo"></td>
		<td><h1>BANK OF UGANDA</h1></td>
		</tr>
	</table>
</div>
<div class="nav">
<ul class="nav nav-tabs">
	 <li><a href="../index.php">Home</a> </li>
	 <li><a href="about.php">About</a></li>
	 <li class="active"><a href="staff.php">Respondent Staff</a> </li>
	 <li><a href="../includes/Login.php">Login</a> </li>
 	 <li><a href="../includes/feedback.php">Check Feedback</a></li>
</ul>
</div>
<div class="well">
<h1>Staff Help Desk Team</h1>
</div> 
<table class="table">
	<tr><td><h4 class="well">Staff Names:</h4></td>
<td><h4 class="well">Staff ID:</h4></td>
<td><h4 class="well">Department:</h4></td>
<td><h4 class="well">Email:</h4></td>
	</tr>
<?php 
include("../includes/database.php");
$staff="SELECT * FROM staff";
$staff_query=mysqli_query($connection,$staff);
while($staff_fetch=mysqli_fetch_array($staff_query)){
	echo "<tr><td>{$staff_fetch['staff_fname']} {$staff_fetch['staff_lname']}</td>
	<td>{$staff_fetch['staff_ID']}</td>
<td>{$staff_fetch['department']}</td>
<td>{$staff_fetch['email']}</td>
	</tr>";
}
?>	
</table>
</body>
</html>