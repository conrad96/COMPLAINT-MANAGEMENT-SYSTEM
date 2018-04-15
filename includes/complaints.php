<?php if(!isset($_GET['uname'])||!isset($_GET['sid']))
		header("location: login.php"); ?>
<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<body style="background: #F5F5DC;">
<div class="container-fluid">
<?php include("logo.php"); ?>
<ul class="nav nav-tabs">
	<li disabled="disabled"><a href="staff.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class="glyphicon glyphicon-user"></span>Respondent:<?php echo $_GET['uname']; ?></a></li>
	<li class="active"><a href="complaints.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class='glyphicon glyphicon-envelope'></span>Complaints</a></li>		
</ul>
<div class="pull-right">
	<ul class="nav nav-pills">
		<li class="active"><a href="../index.php"><span class="glyphicon glyphicon-eye-close"></span>&nbsp;LogOut</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-10" style="overflow: auto; height: 500px;">
		<div class="panel panel-info" style="background: #F5F5DC;">
			<div class="panel-heading">
				<center><h4 class="panel-title text-warning"><span class="glyphicon glyphicon-time"></span>History</h4></center>
			</div>
			<div class="panel-body">
				<?php 
				$siid=$_GET['sid'];
			$str="SELECT * FROM complaints INNER JOIN forwarded ON complaints.cid=forwarded.cid WHERE complaints.status='done' AND forwarded.respondent_id='$siid' ORDER BY complaints.dtime DESC";
			$query=mysqli_query($db->connection,$str);
				?>
				<table class="table" style="width: 100%;">
					<tr class="active">
						<th>Complaint Description</th>
						<th>Faculty</th>
						<th><span class="glyphicon glyphicon-calendar"></span>&nbsp;Date</th>
					</tr>
					<style type="text/css">
						tr td:last-child{						
							    white-space: wrap;
							}
					</style>
				<?php 
				while($rows=mysqli_fetch_array($query)){
echo "<tr><td>".$rows['complaint_description']."</td><td>".$rows['faculty']."</td><td>".$rows['dtime']."</td></tr>";
				}
				?>	
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>
</div>
</body>
</html>