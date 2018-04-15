<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<body style="background: #F5F5DC;">
	<div class="container-fluid">
<?php include("logo.php");  ?>
<ul class="nav nav-tabs">
	<li class="active" disabled="disabled"><a href="login.php"><span class="glyphicon glyphicon-user"></span>Staff:</a></li>
	<li><a href="../index.php"><span class='glyphicon glyphicon-envelope'></span>Complaints</a></li>	
	<li><a href="feedback.php"><span class='glyphicon glyphicon-send'></span>Feedback</a></li>	
</ul>
<div class="row">
	<div class="col-md-8" style="padding-top:100px;padding-left: 300px;">
<?php 
	if(isset($_POST['submit'])){
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
	$msg=$db->login($uname,$pwd);
	echo $msg;
	}
?>		<form action="login.php" method="POST" class="form-horizontal">
			<div class="form-group">
			<label class="col-md-2" for="username">Username:</label>
			<div class="col-md-6">
			<input type="text" name="username" id="username" placeholder="Username..." class="form-control">
			</div>
			</div>
			<div class="form-group">
			<label class="col-md-2" for="password">Password:</label>
			<div class="col-md-6">
			<input type="password" name="password" id="password" placeholder="******" class="form-control">
			</div>
			</div>
			<div class="form-group">
				<label class="col-md-2">&nbsp;</label>
				<div class="col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-success"></div>
			</div>
		</form>
	</div>
	<div class="col-md-4" style="padding-top: 100px;">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span>Only Authorised Staff Allowed</h3>
			</div>
			<div class="panel-body">
				<p class="text-success">
					Please Provide The Correct <b>Username</b> And <b>Password</b> To Login Staff or System Administrator
				</p>
			</div>
		</div>
	</div>
</div>
	</div>
</body>
</html>
