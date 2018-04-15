
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
<div id="navigation" class="navigation">
	 <ul class="nav nav-tabs">
	 <li><a href="../index.php">Home</a></li>
	  <li><a href="../about.php">About</a></li>
 <li><a href="../about/staff.php">Respondent Staff</a> </li>	
 <li class="active"><a href="Login.php">Login</a> </li>
 <li><a href="feedback.php">Check Feedback</a></li>

		 </ul>
	</div>
<div id="about" class="well">
	<h3>Authorized Staff Login</h3>
</div>
 
<?php 
if(isset($_POST['submit'])){
 include("database.php");
	$uid=$_POST['staff_id'];
	$password=$_POST['password'];
	$auth=clean($uid,$password);
	$admin=clean($uid,$password);
	$secure1=md5($auth[1]);
	$secure2=md5($admin[1]);
	$db->login($auth[0],$secure1);
//$admin=$db->login($auth[0],$secure2);
	
// 	$query=mysqli_query($connection,$query_str);
// 	$row=mysqli_fetch_array($query);
// 	$admin_query=mysqli_query($connection,$admin_str);
// 	$admin_fetch=mysqli_fetch_array($admin_query);
// 	//check for accounts 1st in staff table and sys_admin table if exists nd update the login time
// if($row){ 
// goto staff;
// }elseif($admin_fetch){ 
// $aid=$admin_fetch['sys_ID'];
// header("location: admin_view.php?aid=$aid");
// }
// staff:	if($row){
// 	$id=$row['staff_ID'];
// 	$login=date("h:m:s");
// 	$update="UPDATE staff SET login_time='$login',logout_time='' WHERE staff_ID=$id";
// 	$log=mysqli_query($connection,$update);
// 	if($log){
// 	header("location: staff_view_2.php?sid=$id");	
// 	}
// 	}else{echo "<h4 class='well'><font color='red'>Staff Username and Password dont Exist</font></h4><p>";}


}

?>
	 <div id="complaint_field">
<form action="login.php" method="POST" role="form" class="form-horizontal"> 
	 <div class="form-group">
 <label for="staff" class="col-sm-2 control-label">Staff_ID:</label> 
	 <input type="text" name="staff_id" id="staff" class="form-control" required="required"> 
	 </div>
	 <div class="form-group">
 <label for="pwd" class="col-sm-2 control-label">Password:</label> 
	 <input type="password" name="password" id="pwd" class="form-control" required="required"> 
	 </div>
	 <div class="form-group">
	 <div class="col-sm-2 control-label">
	 <label class="col-sm-2 control-label"></label>
	 <input type="submit" name="submit" value="Login" class="btn btn-default"> 
	 </div>
	 </div>
</form>
	</div> 
 <div id="footer"></div> 
</div> 
</body>
</html>