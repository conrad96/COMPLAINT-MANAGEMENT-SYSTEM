<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
	<title></title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
if(isset($_GET['sid'])||$_POSt['submit']){
include("database.php");
$sid=$_GET['sid'];
$str="SELECT * FROM staff WHERE staff_ID=$sid ";
$str_query=mysqli_query($connection,$str);
$str_fetch=mysqli_fetch_array($str_query);
if($str_fetch){ ?>
<div id="navigation" class="navigation">
           <ul class="nav nav-tabs">
           <li class="active"><a href=<?php echo "staff_view_2.php?sid=$sid";?> >Timeline</a></li>
			 
			 <li><a href=<?php echo "history.php?sid=$sid";?>>History</a> </li>
			 <li><a href=<?php echo "logout.php?lid=$sid";?>>Logout</a> </li>
 </ul>
	</div>

<div id="about" class="well">
	<?php echo "<h3>Staff:  {$str_fetch['staff_fname']}  {$str_fetch['staff_lname']}</h3><p>";
	?>
</div>
<table>
<tr>
<td><div id="wrap">
	 <table class="table" >
	 <tr>
	 <td><div id="complaint_field">
		<?php 
		//get the various departments [display complaint to their departments]

		$counter_staff=0;//counters
		$counter_pending=0;
		$department=$str_fetch['department'];
		$dept="SELECT * FROM staff WHERE department='$department' ";
		$dept_query=mysqli_query($connection,$dept);
		echo "<table>";

		while($dept_fetch=mysqli_fetch_array($dept_query)) {
			$staff_ID=$dept_fetch['staff_ID'];
			$str_complaint="SELECT * FROM complaints WHERE staff_ID=$staff_ID AND status='pending' ";
			$str_complaint_query=mysqli_query($connection,$str_complaint);
			while($fetch_broadcast=mysqli_fetch_array($str_complaint_query)){
				$cid=$fetch_broadcast['complainant_ID'];
				echo "<tr><td><b><a href='reply.php?compid={$fetch_broadcast['comp_ID']}&sid=$sid&cid=$cid'>Comp_ID&nbsp;{$fetch_broadcast['comp_ID']}-> Posted a Complaint at {$fetch_broadcast['comp_dtime']}</a></b></td></tr>";		 
			$counter_pending++;
			}
			$counter_staff++;
		}
echo "</table>";


// echo "<ul class='list-unstyled'>";
// $counter_pending=0;
// while($str_complaint_fetch=mysqli_fetch_array($str_complaint_query)){
// 	$user="SELECT * FROM users WHERE ref_ID={$str_complaint_fetch['ref_ID']}";
// 	$user_query=mysqli_query($connection,$user);
// 	$user_fetch=mysqli_fetch_array($user_query);
// 	if($user_fetch){ 
// 	echo "<li><b><a href='reply.php?refid={$str_complaint_fetch['ref_ID']}&sid=$sid'>{$user_fetch['name']} -> Ref_ID {$str_complaint_fetch['ref_ID']} uploaded a Complaint at {$str_complaint_fetch['comp_dtime']}</a></b></li>";
// 	$counter_pending++;
// } 
// }
//echo "</ul>";
		?>
</div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><div id="online_status">
	<?php 
	$stat_2="SELECT * FROM complaints WHERE staff_ID=$sid AND status='replied'";
	$stat_query_2=mysqli_query($connection,$stat_2);
	$counter_replied=0;
	while($row=mysqli_fetch_array($stat_query_2)){$counter_replied++;}
echo "<ul class='nav nav-tabs nav-stacked'><li class='active'><a>Pending Posts<span class='badge'>$counter_pending</span></a></li>";
echo "<li><a>Replied Posts<span class='badge'>$counter_replied</span></a></li>";
echo "<li><a>Colleagues<span class='badge'>$counter_staff</span></a></li>";
echo "</ul>";
	?>
</div> </td>
</tr>

</div> 
<div id="footer"></div>
  
</div> 
<?php }else{header("location: login.php"); }
}?>
</body>
</html>