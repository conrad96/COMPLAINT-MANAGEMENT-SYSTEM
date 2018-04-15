<?php if(!isset($_GET['sid'])) 
header("location: login.php"); ?>
<?php include("database.php"); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<body style="background: #F5F5DC;">
<div class="container-fluid">
<?php include("logo.php"); ?>
<ul class="nav nav-tabs">
	<li class="active" disabled="disabled"><a href="staff.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class="glyphicon glyphicon-user"></span>Respondent: 
<?php  
	if(isset($_GET['uname']))
	echo "<i class='text-warning' style='font-weight:bold;'>".$_GET['uname']."</i>";
?></a></li>
	<li><a href="complaints.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>"><span class='glyphicon glyphicon-envelope'></span>Complaints</a></li>		
</ul>
<div class="pull-right">
	<ul class="nav nav-pills">
		<li class="active"><a href="../index.php"><span class="glyphicon glyphicon-eye-close"></span>&nbsp;LogOut</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-8">
	<div class="panel panel-success" style="height: 500px;overflow: auto;background: #F5F5DC;">
		<div class="panel-heading">
			<?php /* 
			$pending=0;
			$done=0;
			$tot=0;
$get="SELECT * FROM complaints ";			
$get_pend="SELECT * FROM complaints WHERE status='pending' ";
$get_done="SELECT * FROM feedback WHERE status='done' ";
$qp=mysqli_query($db->connection,$get_pend);
$qd=mysqli_query($db->connection,$get_done);
$qt=mysqli_query($db->connection,$get);
while($row=mysqli_fetch_array($qp)){ $pending++; }
while($row=mysqli_fetch_array($qd)){ $done++; }			
while($row=mysqli_fetch_array($qt)){ $tot++; }				
			?>
		<center><h4 class="panel-title">Pending Complaints:<?php 
echo $pending; */
			?>	
			<!-- &nbsp;&nbsp;&nbsp;Answered Complaints:<?php// echo $done; ?>
			&nbsp;&nbsp;&nbsp;Total Complaints:<?php //echo $tot; ?>
			</h4></center> -->
<?php 
$staffid=$_GET['sid'];
$str="SELECT * FROM forwarded INNER JOIN staff ON forwarded.sid=staff.sid WHERE forwarded.respondent_id='$staffid' ";
$q=$db->query($str);
if($q){
	while($row=mysqli_fetch_array($q)){
		echo "<center><h4 class='text-danger'>Forwarded By:".$row['full_name']." AT ".$row['dtime']."</h4></center>";
	break;
	}
}
?>		
		</div>
		<div class="panel-body">
				<!-- 
-display link of the complaint when clicked a div shows up for reply to feedback
			-->
		<table class="table" style="background: #F5F5DC;">
			<tr class="active">
			<th>#</th>
			<th><span class="glyphicon glyphicon-bullhorn"></span>&nbsp;Complaint:</th>
			<th><span class="glyphicon glyphicon-calendar"></span>&nbsp;Date:</th>
			<th>
				<span class="glyphicon glyphicon-send"></span>
			</th>
			</tr>
		<?php 
		//query database to display complaint table data
		//$str="SELECT * FROM complaints WHERE status='pending' ORDER BY cid DESC";
		$id=$_GET['sid'];
$str="SELECT * FROM complaints INNER JOIN forwarded ON complaints.cid=forwarded.cid WHERE forwarded.respondent_id='$id' AND complaints.status='pending' ";		
		$count=1;
		$query=mysqli_query($db->connection,$str);
		while($rows=mysqli_fetch_array($query)){
	echo "<tr>";
	echo "<td>".$count."</td>";
	echo "<td><a href='#' id='".$rows['cid']."'>Complaint Sent On</td>";
	echo "<td><a href='#' id='".$rows['cid']."'> ".$rows['dtime']."</a></td>";
	echo "<td><a href='#' id='".$rows['cid']."' onclick=javascript:show(".$rows['cid']."); >Reply&nbsp;<span class='glyphicon glyphicon-pencil'></span></a>
<input id='desc_".$rows['cid']."' type='hidden' value='".$rows['complaint_description']."' />
	</td>";
	echo "</tr>";
			$count++;
		}
		?>	
		</table>	
		</div>
	</div>			
	</div>
	<div class="col-md-4" style="display: none;" id="reply-field">
		<?php 
/**
* Submit reply to feedback table
**/
if(isset($_POST['replys'])){
	$reply=$_POST['reply'];
	$id=$_POST['cid_s'];
	$sid=$_GET['sid'];
	$date=date("Y-m-d H:m:s");
	$status='done';
	$update="UPDATE feedback SET description='$reply',dtime='$date',sid='$sid',status='$status' WHERE cid='$id' ";
	$query=mysqli_query($db->connection,$update);
	$flg=mysqli_affected_rows($db->connection);
	if($flg){
	$chnge="UPDATE complaints SET status='$status' WHERE cid='$id' ";
	$qury=mysqli_query($db->connection,$chnge);
	/**
also send feedback to maillist
	*/
$mail="SELECT * FROM mailing INNER JOIN feedback ON feedback.refid= mailing.refid WHERE feedback.cid='$id' AND feedback.status='done' ";
$mail_query=mysqli_query($db->connection,$mail);
$mail_fetch=mysqli_fetch_array($mail_query);
if($mail_fetch){
	mail($mail_fetch['email'],'Complaint Feedback',$reply);
	echo "<h5 class='text-success'>Email Sent Successfully to <h4 class='text-danger'>".$mail_fetch['names']."</h4></h5>";
}else{
	echo "<h4 class='text-danger'>Email Address or Contact Was Not Provided</h4>";
}

	if($flg >0 ){
	echo "<h4 class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>Complaint Answered</h4>";
	}	
	}else{
		echo "<h4 class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>Complaint Not Successfully Answered</h4>";
	}
	
}
		?>
		<div style="padding-top: 50px;">
		<div class="panel panel-info" style="background: #F0F8FF;">
			<div class="panel-heading">
				<h4 class="panel-title">Reply Complaint:</h4>
			</div>
			<div class="panel-body">
				<b>
					<div style="width:100%px; word-wrap: break-word;">
					<span id="complaint_text" class="text-success"></span>
					</div>
				</b>
				<hr />
			<form action="staff.php?sid=<?php echo $_GET['sid']; ?>&uname=<?php echo $_GET['uname']; ?>" method="POST">
				<div class="form-group">
					<input type="hidden" name="cid_s"  id="cid_s" value="" >
					<textarea name="reply" placeholder="Reply Complaint Here..." class="form-control" style="height:100px;" required="required"></textarea>
					<div class="form-group" style="padding-top: 10px;"><input type="submit" name="replys" value="Reply" class="btn btn-success btn-block"></div>
				</div>
			</form>
			</div>
			
			
		</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function show(id){
	if(id >= 0 ){
	document.getElementById("reply-field").style.display='block';
	var body=document.getElementById("desc_"+id).value;
	document.getElementById("complaint_text").innerHTML=body;
	document.getElementById("cid_s").value=id;
	//alert(id);
	}else{
		document.getElementById("reply-field").style.display='none';
	}
}
window.onload=show(1);
</script>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/staff.js"></script>
</body>
</html>