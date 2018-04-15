<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >

	<title></title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<img src="#" id="logo" alt="logo">
		</div>
		<div class="col-md-6">
			<h1 class="text-success">Bank Of Uganda</h1></b>
		</div>
	</div>	
<ul class="nav nav-tabs">
	 <li class="active"><a href="about/about.php">Home</a></li>
	 <li><a href="about/about.php">About</a> </li>	
	 <li><a href="about/staff.php">Respondent Staff</a></li>
	 <li><a href="includes/Login.php">Login</a> </li>
	 <li><a href="includes/feedback.php">Check Feedback</a></li>
</ul>
<div id="about" class="well">
	<h3>COMPLAINT MANANGEMENT SYSTEM</h3>
</div>
 <div class="container">
	 <div class="row">
	 <table class="table"><tr><td>
 <div class="col-md-6 col-xs-6">
<div class="panel panel-info">
<div class="panel-title"><h4 class="panel-title">Fill in Required Details</h4></div>
<div class="panel-body">
<form action="includes/user_2.php" method="POST" role="form">	
<div class="form-group">
 <label for="name">Email:</label> 
 <input type="text" name="email" id="name" placeholder="e.g tom@bou.or.ug" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="pin">PIN:</label> 
 <input type="number" name="pin" id="pin" placeholder="e.g 1234" class="form-control"> 
 </div>
 <div class="form-group">
<label for="category">Category</label>
<select name="category" class="form-control" id="category">
	<option>Finance</option>
	<option>Security</option>
	<option>IT</option>
	<option>Human Resource</option>
	<option>Communication</option>
</select>
 </div>
 <div class="form-group">
 <textarea id="complaint_text" name="complaint" placeholder="Fill Complaint Here..." class="form-control" rows="3"></textarea> </div>
		<input type="submit" name="submit" class="btn btn-default">
</form>
	</div> 
	</div>
</div></td>
<td>
	 <div class="col-md-6 col-xs-6 " >
	 <div class="panel panel-info">
		<h3 class="well">Online Help Staff</h3>
      	<?php 
      	include("includes/database.php");
$view="SELECT * FROM staff WHERE logout_time='' ";
$view_query=mysqli_query($connection,$view);
echo "<table>";
echo "<tr><td class='well'>Name:</td><td class='well'>Department:</td></tr>";
while($view_fetch=mysqli_fetch_array($view_query)){
echo "<tr><td><li><font color='green'>{$view_fetch['staff_fname']}</font></li></td>
<td><font color='green'>{$view_fetch['department']}</font></td>
</tr>";
}
echo "</table>";
      	?>

      	</div>
	</div> </td></tr></table>

	</div>
</div> 
  <?php include("includes/footer.php"); ?>

</body>
</html>