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
<?php 
if(isset($_POST['forward'])){
	$cid=$_POST['complaint_id']; 
	$admin=$_POST['admin_id'];
	$sid=$_POST['respondent'];
	$dtime=date("Y-m-d H:m:s");
	//echo "Complaint ID: ".$cid."<p>Admin ID:".$admin."<p>respondent ID:".$sid;
	$cmd="INSERT INTO forwarded VALUES('','$admin','$sid','$cid','$dtime')";
	$query=$db->query($cmd);
if(!$query){
echo "<h4 class='alert alert-danger'>Error Occured When Forwarding Complaint</h4>";
}else{
	echo "<h5 class='text-success'>Complaint Forwarded Successfully.</h5>";
}
}
?> 
<div class="row" style="padding-top: 50px;">
		<!-- 
-get complaints as a list /view and forwards to respondent
-gets a list of only pending complaints
-chooses which respondent to forward to
-
		-->
<div id="area">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Complaint Section</h4>
			</div>
			<div class="panel-body" style="overflow: auto;height: 400px;">
			<ul class="list-group">
				<?php 
//query for all complaints
				$sql="SELECT * FROM complaints WHERE status='pending' ORDER BY dtime DESC ";
				$q=$db->query($sql);
		while($row=mysqli_fetch_array($q)){
			echo "<li class='list-group-item'>".$row['complaint_description'];
				echo "<a onclick='javascript:forward(".$row['cid'].");'><span class='glyphicon glyphicon-share pull-right'></span></a></li>";
				}
				
				?>
			</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="display: none;" id="forward">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Forward Complaint To:</h4>
			</div>
			<div class="panel-body">
			<form action="admin-view.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>" method="POST">
				<input type="hidden" name="admin_id" value=<?php echo $_GET['sid']; ?> ><!-- Admin/Senders ID-->
				<input type="hidden" name="complaint_id" value="" id="complaint">
				<select name="respondent" class="form-control">
					<?php 
					$respondent="SELECT * FROM staff WHERE role='staff' ";
					$qu=$db->query($respondent);
					while($row=mysqli_fetch_array($qu)){
						echo "<option value='".$row['sid']."'>".$row['full_name']."</option>";
					}

					?>
				</select><hr />
				<span class="glyphicon glyphicon-send"></span><input type="submit" name="forward" value="Forward" class="btn btn-success btn-block">
			</form>
			<script type="text/javascript">
				function forward(cid){
					document.getElementById("area").classList.add("col-md-8");
					document.getElementById("forward").style.display='block';
					//set respondents ID
					document.getElementById("complaint").value=cid;
				}
			</script>
				<?php 
		//		$sql="SELECT * FROM staff WHERE role='staff' ";
		//		$query=$db->query($sql);
		//		while($rows=mysqli_fetch_array($query)){
		//		echo "<li class='list-group-item'><b class='text-danger'>".$rows['full_name']."</b></li>";
		//		}
				?>
			</div>
		</div>
	</div> 
	</div>
</div>

<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/staff.js"></script>
</body>
</html>