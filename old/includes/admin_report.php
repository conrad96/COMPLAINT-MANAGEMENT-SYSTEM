 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="../css/main.css">
	<title></title>
	 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

 <div id="wrapper">
<div id="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo"></td>
		<td><h1>BANK OF UGANDA</h1></td>
		</tr>
	</table>
</div>
<?php 
if(isset($_GET['aid'])||$_POST['submit']){
include("database.php");
$aid=$_GET['aid'];
$str="SELECT * FROM sys_admin WHERE sys_ID=$aid ";
$str_query=mysqli_query($connection,$str);
$str_fetch=mysqli_fetch_array($str_query);
if($str_fetch){?>
<div id="navigation" class="nav">
		<ul class="nav nav-tabs">
			 <li><a href=<?php echo "admin_view.php?aid=$aid";?>>Dashboard</a></li>
	 <li><a href=<?php echo "admin_create.php?aid=$aid";?>>Create Account</a> </li>
	 <li><a href=<?php echo "admin_update.php?aid=$aid";?>>Update Account</a> </li>
	 <li><a href=<?php echo "admin_delete.php?aid=$aid";?>>Delete Account</a> </li>
	 <li class="active"><a href=<?php echo "admin_report.php?aid=$aid";?>>Report</a> </li>
	 <li><a href=<?php echo "logout.php?lid=$aid";?>>Logout</a> </li>
		</ul>
	</div>
<div id="about" class="well">
<?php echo "<h3>ADMIN : System Activity </h3><p>";
	?>
</div>
 <div id="wrap">
	<table class="table">
	<tr>
	<td><div id="div1">
<h4 class="well">Pending Complaints:</h4><p>
	<?php 
$comp="SELECT * FROM complaints";
$comp_query=mysqli_query($connection,$comp);
$stat1="SELECT * FROM complaints";
$stat2="SELECT * FROM complaints WHERE status='replied' ";
$stat3="SELECT * FROM complaints WHERE status='pending' ";
$stat_query1=mysqli_query($connection,$stat1);
$stat_query2=mysqli_query($connection,$stat2);
$stat_query3=mysqli_query($connection,$stat3);
$count_complaints=0;
$count_replied=0;
$count_pending=0;

while($stat_fetch=mysqli_fetch_array($stat_query3)){ 
	$id=$stat_fetch['comp_ID'];
	$cid=$stat_fetch['complainant_ID'];
echo "<a href='admin_reply_view.php?aid=$aid&compid=$id&cid=$cid' >Staff {$stat_fetch['staff_ID']} received Complaint at {$stat_fetch['comp_dtime']}</a><p>";
$count_pending++;
}
	?></div></td>
	<td> <div id="div2" >
	<h4 class="well">Replied Complaints:</h4><p>
<?php 
while($stat_fetch=mysqli_fetch_array($stat_query2)){ $id=$stat_fetch['comp_ID'];$cid=$stat_fetch['complainant_ID'];
$r_time="SELECT * FROM feedback WHERE comp_ID=$id";
$r_query=mysqli_query($connection,$r_time);
while($r_fetch=mysqli_fetch_array($r_query)){
echo "<a href='admin_reply_view_2.php?aid=$aid&compid=$id&cid=$cid'>Staff {$stat_fetch['staff_ID']} Replied Complaint at {$r_fetch['fd_dtime']}</a><p>";	
}
	$count_replied++; }
?>
	</td>
	</div>
<td><div id="div3">
	<h4 class="well">Statistics Board</h4>
	<?php 
while($stat_fetch=mysqli_fetch_array($stat_query1)){$count_complaints++;}
	?>
<table class="table">
<tr><td>Total Complaints Sent:</td>
<td><?php echo "$count_complaints";?></td>
</tr>
<tr>
<td>Total Complaints Pending:</td>
<td><?php echo "$count_pending";?></td>
</tr>
<tr>
	<td>Total Complaints Replied:</td>
	<td><?php echo "$count_replied";?></td>
</tr>
<tr>
<td>Productivity:</td>
<td><?php 
$math=round(($count_replied/$count_complaints)*100,3);
echo "$math %";
?></td>
</tr>
</table>	

</div></td>
 	</tr>
	</table>
</div></td>
</tr>
<tr>
<td><div id="footer"></div></td><td>&nbsp;</td>
</tr>
</table>
</div>
</td>
<td>
	
</td>
</tr>
</table>
<?php }}?>
 
</body>
</html>