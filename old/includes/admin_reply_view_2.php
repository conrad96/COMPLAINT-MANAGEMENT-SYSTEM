 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>

 <div id="wrapper">
<div id="header" class="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo"></td>
		<td><h1>BANK OF UGANDA</h1></td>
		</tr>
	</table>
</div>
	<?php 
if(isset($_GET['compid'])){
include("database.php");
$aid=$_GET['aid'];
$compid=$_GET['compid'];
$str="SELECT * FROM sys_admin WHERE sys_ID=$aid ";
$str_query=mysqli_query($connection,$str);
$str_fetch=mysqli_fetch_array($str_query);
if($str_fetch){?>
<div id="navigation" >
<ul class="nav nav-tabs">
		<li><a href=<?php echo "admin_view.php?aid=$aid";?>>Dashboard</a> </li>
	 <li><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li class="active"><a href=<?php echo "admin_report.php?aid=$aid";?>>Back to Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>
	 </ul>
	</div>

<div id="about" class="well">

<?php	echo "<h4>ADMIN : View Activity Details [Replied Complaint]</h4><p>";
$reply="SELECT * FROM feedback WHERE comp_ID=$compid ";
$reply_query=mysqli_query($connection,$reply);
$reply_fetch=mysqli_fetch_array($reply_query);
if($reply_fetch){
	$dept="SELECT * FROM staff WHERE staff_ID={$reply_fetch['staff_ID']}";
	$dept_query=mysqli_query($connection,$dept);
	$dept_fetch=mysqli_fetch_array($dept_query);
	?>
</div>
 
 <div id="wrap">
	<table>
	<tr>
	<td><div id="complaint_field">
	<h3 class="well">Reply Details</h3><p>
<table class="table">
<tr><td>Reply Subject:</td>
<td><?php echo "{$dept_fetch['department']}";?></td>
</tr>
<tr>
<td>Complaint ID:</td>
<td><?php echo "{$reply_fetch['comp_ID']}";?></td>
</tr>
<tr>
<td>To: </td>
<td><?php echo "{$reply_fetch['staff_ID']}";?></td>
</tr>
<tr>
<td>From: </td>
<td><?php echo "{$reply_fetch['complainant_ID']}";?></td>
</tr>

<tr>
<td>Date/Time</td>
<td><?php echo "{$reply_fetch['fd_dtime']} ";?></td>
</tr>
<tr>
<td>Feedback:</td>
<td><?php echo "{$reply_fetch['fd_field']}";?></td>
</tr>
 </table>
<?php } ?>
	</div> 
	 
</div></td>
</tr>
<tr>
<td><div id="footer"></div></td>
</tr>
</table>
</div>
</td>
<td>
	
</td>
</tr>
</table>
</body>
<?php }} ?>
</html>