<?php 
//include("includes/database.php"); 
include("logo.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<body style="background: #F5F5DC;">
<div class="nav" style="background: #F5F5DC;">
<ul class="nav nav-tabs">
	 <li class="active" disabled='disabled'><a href="index.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Complaints</a></li>
	 <li><a href="includes/feedback.php"><span class="glyphicon glyphicon-send"></span>&nbsp;FeedBack</a></li>
</ul>
<center><h3 style="font-weight: bold;">ACADEMIC COMPLAINT MANAGEMENT SYSTEM</h3></center>
<div class="pull-right">
	<ul class="nav nav-pills">
		<li class="active"><a href="includes/login.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Login</a></li>
	</ul>
</div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
<script type="text/javascript" src="js/bootstrap.min.js"></script>		
	<!-- 
Student goes to home page and logs complaint gets a random ref number
which he will use to get Feedback
	-->
<div class="c-body" style="padding-top: 70px;padding-left: 100px;background: #F5F5DC;">
	<div class="complaint-body col-md-6" style="margin: 0 auto;text-align: center;">
		<form action="index.php" method="POST" role="form" class="form-horizontal">
			<div class="form-group">
				<label for="fac" class="text-warning">Select Faculty To Complain To:</label>
				<select id="fac" name="faculty" class="form-control" style="background: #F5F5DC;">
					<option>Faculty Of Science And Technology</option>
					<option value="#">Other Faculties</option>
				</select>
				<textarea name="complaint" class="form-control" placeholder="Type Complaint Here..." style="height: 200px;background: #F0FFF0;"></textarea>
			</div>
			<div class="form-group">
			<input type="submit" name="submit" value="Send Complaint" class="btn btn-success btn-lg btn-block" >
			</div>
		</form>
	</div>
	<div style="padding-top: 25px;">
<div class="col-md-6 panel panel-info">
		<div class='panel-heading'>
		<h4 class="panel-title">Complaint Management System</h4>
		</div>
		<div class="panel-body">
			<p class="text-warning">Type Complaint in the Field ,You Will Receive A Reference ID, which You  Will Use To Get Your FeedBack </p>
		</div>
<ul class="list-group">		
		<?php 
//after submit message with reference ID is sent to student
	require("includes/database.php");
if(isset($_POST['submit'])){
$complaint=$_POST['complaint'];	
$date=date("Y-m-d H:m:s");
$faculty=$_POST['faculty'];
$result=$db->query("INSERT INTO complaints VALUES('','$complaint','pending','$date','$faculty')");
if(!empty($result)){
	//echo "<li class='list-group-item'><h4 class='text-success'><span class='glyphicon glyphicon-ok'></span>&nbsp;Complaint Submitted Successfully, Copy the Reference Number For Accessing Your Feedback.</h4></li>";
	echo '
	<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	 	<div class="modal-dialog"> 
	 		<div class="modal-content"> <div class="modal-header"> 
	 			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; 
	 			</button> 
	 			<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-ok"></span>&nbsp;Success
		</h4> 
		</div> <div class="modal-body">Complaint Submitted Successfully, Copy the Reference Number For Accessing Your Feedback</div> 
		<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal" id="close-btn">Close </button> 
			<button type="button" class="btn btn-primary" id="continue-btn">Continue</button> 
		</div> 
			</div><!-- /.modal-content --> 
		</div><!-- /.modal -->
	</div>';
	$str="SELECT cid FROM complaints ORDER BY cid DESC LIMIT 1";
	$query=$db->query($str);
	$rows=$db->fetch($query);
	//print_r($rows);
	$cid=0;
	foreach($rows as $row){
		$cid=$row;
	}
	if($cid == 0){ $cid=''; }
	$str="INSERT INTO feedback VALUES('','null','null','$cid','','pending')";
	$qu=$db->query($str);
	if(!$qu){
		echo "<li class='list-group-item'><h5 class='alert alert-danger'>Error Getting Reference ID</h5></li>";
	}else{
		//SELECT * FROM users INNER JOIN emergency ON users.user_id=emergency.user_id WHERE emergency.status='pending' ORDER BY dtime DESC
		$get="SELECT refid FROM feedback INNER JOIN complaints ON feedback.cid=complaints.cid WHERE complaints.cid='$cid' ";
		$q=$db->query($get);
		$rows=$db->fetch($q);
		foreach($rows as $row){
			echo "<li class='list-group-item'><h3 class='alert alert-success' style='text-align:center;font-weight:bold;'>CmSxRf".$row."IdFy</h3></li>
			<li class='list-group-item'><a href='#' onclick='javascript:inbox();'>Do You Wish To Receive Feedback As SMS or Email.? Click Here</a><input type='hidden' value='CmSxRf".$row."IdFy' id='reference' /></li>
			";
			break;
		}
	}

}else{
	echo "<li class='list-group-item'><h5 class='alert alert-danger'>Fatal Error Occured, Failed to Send Complaint</h5></li>";	
}

}
	
	?>
<div class="panel panel-success">
	<div class="panel-heading">
	<?php if(isset($_POST['mail'])){
		$names=$_POST['names']; 
		$phone=$_POST['phone'];
		$email =$_POST['email'];
		$faculty =$_POST['faculty'];
		$refid=$_POST['refer'];
	$x=str_replace('CmSxRf','', $refid);
	$id=str_replace('IdFy','', $x);
	if(!empty($names)||!empty($phone)||!empty($email)||!empty($faculty)||!empty($refid)){
			$operation="INSERT INTO mailing VALUES('','$names','$phone','$email','$faculty','$id')";
			$query=$db->query($operation);
			if(mysqli_affected_rows($db->connection) > 0){
				echo "<span class='glyphicon glyphicon-ok'>Success We shall Send Your Feedback As SMS and Email</span>";
			}else{
				echo "<span class='text-danger glyphicon glyphicon-remove'>An Error Occured..Please Tray Again Later</span>";
			}

		}else{
			echo "<h5 class='text-danger'>Fill In All Fields To Receive Feedback as SMS or Email</h5>";
		}

	} ?>
	</div>
	<div class="panel-body" style="display: none;" id="form_mail">
		<form action="index.php" method="POST">
			<input type="hidden" name="refer" id="form_refid" value="">
			<div class="form-group">
			<label for="names">Names:</label>
			<input type="text" name="names" placeholder="Type Your Names Here..." class="form-control" id="names">
			</div>
			<div class="form-group">
			<label id="phone">Phone Contact:</label>
			<input type="text" name="phone" placeholder="Type Your Phone Contact Here..."  id="phone" class="form-control">
			</div>
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" class="form-control">
			</div>
			<div class="form-group">
			<label for="fac">Faculty Or Department:</label>
			<input type="text" name="faculty" id="fac" class="form-control" placeholder="Type Your Faculty Here...">
			</div>
			<div class="form-group">
				<input type="submit" name="mail" value="Finish" class="btn btn-success btn-block">
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>	 
</div>
<script type="text/javascript" src="js/staff.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>