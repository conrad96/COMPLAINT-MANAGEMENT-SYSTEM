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
	<div class="pull-right" style="padding-bottom: 30px;">
		<ul class="nav nav-pills">
			<li class="active"><a href="../index.php"><span class="glyphicon glyphicon-eye-close"></span>&nbsp;LogOut</a></li>
		</ul>
	</div> 
	<div class="row" style="padding-top: 70px;">
		<!-- 
-click on link to activate admin or staff account to create nd submit form to staff table
-Display List of All staff in users table.
		-->
<div class="col-md-6">		
<div class="panel panel-info"  style="background: #F5F5DC;">
	<div class="panel-heading">
		<h4 class="panel-title">Admins:<span class="glyphicon glyphicon-cog"></span></h4>
	</div>
	<div class="panel-body">
		<?php 
		$str1="SELECT * FROM staff WHERE role='admin' ";
		$query=mysqli_query($db->connection,$str1);
		?>
		<ul class="list-group">
			<?php 
			$count=1;
while($rows=mysqli_fetch_array($query)){
	echo "<li class='list-group-item'>".$count.'&nbsp;&nbsp;&nbsp;<b class="text-success">'.$rows['full_name']."</b></li>";
$count++;
}
			?>
		</ul>
	</div>
</div>
</div>
<div class="col-md-6">		
	<div class="panel panel-info"  style="background: #F5F5DC;">
	<div class="panel-heading">
		<h4 class="panel-title">Respondent Staff:<span class="glyphicon glyphicon-user"></span></h4>
	</div>
	<div class="panel-body">
		<?php 
		$str1="SELECT * FROM staff WHERE role='staff' ";
		$query=mysqli_query($db->connection,$str1);
		?>
		<ul class="list-group">
			<?php 
			$c=1;
while($rows=mysqli_fetch_array($query)){
	echo "<li class='list-group-item'>".$c.'&nbsp;&nbsp;&nbsp;<b class="text-success">'.$rows['full_name']."</b></li>";
$c++;
}
			?>
		</ul>
	</div>
</div>

</div>
	 
</div>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/staff.js"></script>
</body>
</html>