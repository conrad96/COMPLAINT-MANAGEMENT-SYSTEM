<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" >
	<title></title>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body> 
<div id="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo" class="img-responsive"></td>
		<td><h1>BANK OF UGANDA</h1></td>
		</tr>
	</table>
</div>
	<?php 
if(isset($_GET['compid'])&&isset($_GET['sid'])){
include("database.php");
$sid=$_GET['sid'];
$compid=$_GET['compid'];
$cid=$_GET['cid'];
$staff_name="SELECT * FROM staff WHERE staff_ID='$sid' ";
$staff_query=mysqli_query($connection,$staff_name);
$staff_fetch=mysqli_fetch_array($staff_query);
if($staff_fetch){
?>
<div id="navigation" class="nav">
		<ul class="nav nav-tabs">
			 <li><a href=<?php echo "staff_view_2.php?sid=$sid";?>>Timeline</a> </li>
			  
			 <li class="active"><a href=<?php echo "reply.php?compid=$compid&sid=$sid";?>>Reply</a></li>
			 <li><a href="logout.php?lid=$sid">Logout</a> </li>
		</ul>
	</div>

<div id="about" class="well">
<?php 
echo "<h3>Complaint Feedback</h3> ";
	?>
</div>
 	 	<table class="table"> 
 <tr><td><div id="feedback">
	
<h2><span class="label label-default">Reply:</span></h2>
<form action=<?php echo "reply_engine.php?compid=$compid&sid=$sid&cid=$cid"; ?> method="POST" role="form">
<div class="form-group">
	<textarea name="reply" id="complaint_field" rows="4" class="form-control"></textarea><p>
	</div>
	<div class="form-group">
	<div class="form-control">
	<input type="submit" name="submit" value="Reply" class="btn btn-default">
	</div>
	</div>
</form>
 	 
	</div> </td>
	<td><div id="comp">
	<?php 
 $str="SELECT * FROM complaints WHERE comp_ID='$compid' ";
 $cat="SELECT * FROM staff WHERE staff_ID=$sid";
 $str_query=mysqli_query($connection,$str);
 $cat_query=mysqli_query($connection,$cat);
 $cat_fetch=mysqli_fetch_array($cat_query);
 $str_fetch=mysqli_fetch_array($str_query);
echo "<table class='table'>";
echo "<tr><td><b>Complaint Date/Time:</b></td><td>{$str_fetch['comp_dtime']}</td></tr>";
echo "<tr><td><b>Forwared Department:</b></td><td>{$cat_fetch['department']}</td></tr>";
echo "<tr><td><b>Complaint Body:</b></td><td>{$str_fetch['complaint_field']}</td></tr>";
echo "</table>";	
		?>
	</div></td></tr>
	 </table>
 
 <div id="footer"></div> 
<?php }else{header("location: login.php");}}?>
</body>
</html>