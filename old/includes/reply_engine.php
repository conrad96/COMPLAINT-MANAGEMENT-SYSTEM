<?php 
if(isset($_POST['submit'])||isset($_GET['compid'])){
	include("database.php");
	$status="replied";
	$sid=$_GET['sid'];
	$compid=$_GET['compid'];
	$reply=$_POST['reply'];
	$reply_dtime=date("y/m/d h:m:s");
	$cid=$_GET['cid'];
	 
	//insert the Feedback into the feedback table
$feedback="INSERT INTO feedback VALUES('','$reply','$reply_dtime','$compid','$sid','$cid')";
$feedback_query=mysqli_query($connection,$feedback);
if($feedback_query){
echo "<script>alert('Reply Sent Successfully ');</script>";
//if its a success then update the status of complaint as replied
$stat="UPDATE complaints SET status='$status',staff_ID='$sid' WHERE comp_ID='$compid' ";
$stat_query=mysqli_query($connection,$stat);
if($stat_query){
		$mail="SELECT * FROM complainants WHERE complainant_ID=$cid";
		$mail_query=mysqli_query($connection,$mail);
		$mail_fetch=mysqli_fetch_array($mail_query);
		if($mail_fetch){
			$ddr=$mail_fetch['email'];
		    $subject="Feedback";
		    $message=wordwrap($reply,100);
			if(mail($addr,$subject,$message)){
				echo "<script>alert('Email Sent to Complainant');</script>";
			}else{
				echo "<script>alert('Email not Sent to Complainant');</script>";
			}
}else{echo "<script>alert('Error Mail is not sent');</script>";}
header("location: staff_view_2.php?sid=$sid");	
}else{echo "<script>alert('Failed to Update Complaint Status please Report to System Admin');</script>";}
}else{
echo "<script>alert('Error in Replying Client, Try Again Later');</script>";
echo "<font color='red'><h5 class='well'>Fatal Error in Querying Database, Please Trya Again</h5></font>";
}

}else{
	header("location: login.php");
}
?>