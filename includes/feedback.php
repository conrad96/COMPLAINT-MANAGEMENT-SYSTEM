<?php 
include("database.php");
include("head.php"); 
?>
<div class="row">
<div class="col-md-8 feedback-body" style="padding-top: 20px;background: #F5F5DC;">
	<blockquote><h5 class="text-info">Type or Paste The Reference ID into Field to get Your Feedback</h5></blockquote>
<form action="feedback.php" method="POST" class="form-vertcal" role="form">
		<div class="form-group">
		<label class="col-md-2 label label-primary"><h4>Reference ID:</h4></label>	
		<div class="col-md-6">
		<input type="text" name="refid" placeholder="Type Reference ID Here..." class="form-control">
		</div>
		<input type="submit" name="submit" value="Get FeedBack" class="btn btn-primary">
		</div>
</form>
<?php if(isset($_POST['submit'])){ ?>
<div style="padding-top: 20px;">
	<div class="panel panel-info" style="background: #F0FFF0;">
 		<div class="panel-heading">
 			<center>
 			<h5 class="text-warning">For More Information Visit The Dean Of Student</h5></center>
 		</div>
 	<div class="panel-body">
 		
 		<?php 
	$refid=$_POST['refid'];
$cleanID=0;
if(strlen($refid) <= 15){
	$x=str_replace('CmSxRf','', $refid);
	$id=str_replace('IdFy','', $x);
	$chck="SELECT * FROM feedback WHERE refid='$id' ";
	$quer=$db->query($chck);
	$fet=mysqli_fetch_array($quer);
if(empty($fet)){
	echo "<h4 class='text-danger'>Reference ID doesnot Exist, Please Input Correct Reference ID</h4>";
	}else{

	$cleanID=$id;
	$str="SELECT * FROM complaints LEFT JOIN feedback ON feedback.cid=complaints.cid WHERE feedback.refid='$id' AND feedback.status='done' ";$query=mysqli_query($db->connection,$str);
	$check=mysqli_fetch_array($query);
	if($check['status'] == 'done'){
		echo "<table class='table'>";
		echo "<tr><td><h4 class='text-danger'>Complaint:</h4></td>";
 		echo "<td><blockquote>";
 		echo $check['complaint_description'];
 		echo "</blockquote></td></tr>";
 		echo "</table><hr />";
 		echo "<table class='table'>";
		echo "<tr><td><h4 class='text-danger'>Feedback:<span class='glyphicon glyphicon-send'></span></h4></td>";
 		echo "<td><blockquote>";
 		echo $check['description'];
 		echo "</blockquote></td></tr>";
 		echo "</table><hr />";
 		}
 		}//end else
	}else{
		echo "<h4 class='text-danger'>Wrong Reference ID Inserted, Please Input Correct Reference ID</h4>";
}


 		
 		?>

 	</div>
 	</div>
 </div>	
 
</div>

<div class="col-md-4">
	<div style="padding-top: 50px;">
	<div class="panel panel-success" style="background: #F0FFF0;">
		<div class="panel-heading">
			<h4 class="panel-title">FeedBack Details:<span class="glyphicon glyphicon-send"></span></h4>
		</div>
		<div class="panel panel-body" style="background: #F0FFF0;">
			<?php
		$string="SELECT * FROM feedback WHERE refid='$cleanID' AND status='done' ";
			$qu=mysqli_query($db->connection,$string);
			$fe=mysqli_fetch_array($qu); 
			if(!empty($fe)){
echo "<table class='table'>";
echo "<tr class='active'>
<th>Status</th>
<th><span class='glyphicon glyphicon-calendar'></span>&nbsp;Date</th>
</tr>";
echo "<tr><td><span class='glyphicon glyphicon-ok'></span></td><td>
".$fe['dtime']."
</td></tr>";
echo "</table>";
			}else{
				echo "<h5 class='alert alert-danger'>Your Complaint Has Not Yet Been Answered Please Wait Abit And Try Again Later</h5>";
			}
			?>
		</div>
	</div>
	</div>
</div>
<?php } ?>
</div>

</div>