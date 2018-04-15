<?php 
if(isset($_GET['lid'])){
include("database.php");
$id=$_GET['lid'];
$logout=date("h:m:s");
	//update the staff's logout time
  $lout="UPDATE staff SET logout_time='$logout' WHERE staff_ID='$id' ";
$lout_query=mysqli_query($connection,$lout);
if($lout_query){
 header("location: ../index.php");
}
 
}
?>