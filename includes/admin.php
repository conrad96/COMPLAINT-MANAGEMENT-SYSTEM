<?php if(!isset($_GET['sid'])) 
header("location: login.php"); ?>
<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<body  style="background: #F5F5DC;">
<div class="container-fluid">
	<?php include("logo.php"); ?>
	<ul class="nav nav-tabs">
		<li class="active" disabled="disabled"><a href="admin.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class="glyphicon glyphicon-dashboard"></span>Admin:<i class="text-danger"><?php echo $_GET['uname'];?></i></a></li>
		<li><a href="admin-view.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class='glyphicon glyphicon-envelope'></span>Complaints</a></li>
		<li><a href="users.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class="glyphicon glyphicon-user"></span>Users</a></li>
	</ul>
	<div class="pull-right">
		<ul class="nav nav-pills">
			<li class="active"><a href="../index.php"><span class="glyphicon glyphicon-eye-close"></span>&nbsp;LogOut</a></li>
		</ul>
	</div> 
	<div class="row" style="padding-top: 40px;">
		<!-- 
-click on link to activate admin or staff account to create nd submit form to staff table
-Display List of All staff in users table.
		-->
		<div class="col-md-3" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">Create Accounts:</h4>
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item"  style="background: #DCDCDC;"><a href="#" onclick="javascript:form(1);">Create Staff Account:<span class="glyphicon glyphicon-user"></span></a></li>
				<li class="list-group-item"  style="background: #DCDCDC;"><a href="#" onclick="javascript:form(2);">Create Admin Account:<span class="glyphicon glyphicon-dashboard"></span></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-8"  style="background: #F5F5DC;">
			<div class="panel panel-info" style="display: none;" id="staff-div"  style="background: #F5F5DC;" >
				<div class="panel-heading">
					<center><h4 class="panel-title">Register Staff:<span class="glyphicon glyphicon-user"></span></h4></center>
				</div>
			<div class="panel-body"  style="background: #F5F5DC;" >
					<?php 
if(isset($_POST['staff'])){
if($_POST['password'] != $_POST['cpassword'])
	echo "<h4 class='alert alert-danger'>Passwords Dont Match,Please Try Again</h4>";
else{
$username=$_POST['username'];
$pwd=$_POST['cpassword'];
$full=$_POST['full_names'];
$role=$_POST['role'];
$admin="INSERT INTO staff VALUES('','$username','$pwd','$full','$role')";
$admin_q=$db->query($admin);
$flag=mysqli_affected_rows($db->connection);
if($flag>0){
	echo "<h4 class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;Staff Registered Successfully</h4>"; 
}
}

}
			?>
				<form action="admin.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>" method="POST" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-md-2" for="username">Username:</label>
					<div class="col-md-6">
						<input type="text" name="username" id="username" placeholder="Type Staff Username Here..." class="form-control">
					</div>
				</div>
				<div class="form-group">	
					<label class="col-md-2" for="password">Password:</label>
					<div class="col-md-6">
						<input type="password" name="password" id="password" class="form-control">
					</div>
				</div>
				<div class="form-group">	
					<label class="col-md-2" for="cpassword">Confirm Password:</label>
					<div class="col-md-6">
						<input type="password" name="cpassword" id="cpassword" class="form-control">
					</div>
				</div>
				<input type="hidden" name="role" value="staff">
				<div class="form-group">	
					<label class="col-md-2" for="full_names">Full Names</label>
					<div class="col-md-6">
						<input type="text" name="full_names" id="full_names" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
				<div class="col-md-6" >
					<input type="submit" name="staff" value="Register" class="btn btn-success btn-block">
				</div>
				</div>
			</form>
			</div>		
			</div>
			<!-- Admin-->
			<div class="panel panel-info" style="display: none;" id="admin-div"  style="background: #F5F5DC;">
				<div class="panel-heading">
					<center><h4 class="panel-title">Register Admin:<span class="glyphicon glyphicon-dashboard"></span></h4></center>
				</div>
			<div class="panel-body"  style="background: #F5F5DC;" >
				<?php 
if(isset($_POST['admin'])){
if($_POST['password'] != $_POST['cpassword'])
	echo "<h4 class='alert alert-danger'>Passwords Dont Match,Please Try Again</h4>";
else{
$username=$_POST['username'];
$pwd=$_POST['cpassword'];
$full=$_POST['full_names'];
$role=$_POST['role'];
$admin="INSERT INTO staff VALUES('','$username','$pwd','$full','$role')";
$admin_q=$db->query($admin);
$flag=mysqli_affected_rows($db->connection);
if($flag>0){
	echo "<h4 class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;Admin Registered Successfully</h4>"; 
}
}

}
			?>
				<form action="admin.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>" method="POST" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-md-2" for="username">Username:</label>
					<div class="col-md-6">
						<input type="text" name="username" id="username" placeholder="Type Admin Username Here..." class="form-control">
					</div>
				</div>
				<div class="form-group">	
					<label class="col-md-2" for="password">Password:</label>
					<div class="col-md-6">
						<input type="password" name="password" id="password" class="form-control">
					</div>
				</div>
				<div class="form-group">	
					<label class="col-md-2" for="cpassword">Confirm Password:</label>
					<div class="col-md-6">
						<input type="password" name="cpassword" id="password" class="form-control">
					</div>
				</div>
				<input type="hidden" name="role" value="admin">
				<div class="form-group">	
					<label class="col-md-2" for="full_names">Full Names</label>
					<div class="col-md-6">
						<input type="text" name="full_names" id="full_names" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
				<div class="col-md-6" >
					<input type="submit" name="admin" value="Register" class="btn btn-success btn-block">
				</div>
				</div>
			</form>
			
			</div>		
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/staff.js"></script>
</body>
</html>