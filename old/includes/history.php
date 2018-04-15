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
if(isset($_GET['sid'])||$_POST['submit']){
include("database.php");
$sid=$_GET['sid'];
$str="SELECT * FROM staff WHERE staff_ID=$sid ";
$str_query=mysqli_query($connection,$str);
$str_fetch=mysqli_fetch_array($str_query);
if($str_fetch){ ?>
<div id="navigation" class="navigation">
           <ul class="nav nav-tabs">
           <li ><a href=<?php echo "staff_view_2.php?sid=$sid";?> >Timeline</a></li>
			  
			 <li class="active"><a href=<?php echo "history.php?sid=$sid";?>>History</a> </li>
			 <li><a href=<?php echo "logout.php?lid=$sid";?>>Logout</a> </li>
 </ul>
	</div>

<div id="about" class="well">
	<?php echo "<h3>Staff:  {$str_fetch['staff_fname']}  {$str_fetch['staff_lname']}</h3>";
	?>
</div>
<table>
<tr>
<td><div id="wrap">
	 <table class="table" >
	 <tr>
	 <td><div id="complaint_field">
	 <h4 class="well">History -> All Replied Complaints</h4>
		<?php 
		$replied="SELECT * FROM complaints WHERE staff_ID=$sid AND status='replied' ";
		$replied_query=mysqli_query($connection,$replied) ;
		echo "<table>";
		while($replied_fetch=mysqli_fetch_array($replied_query)){
	// $fb="SELECT * FROM feedback WHERE staff_ID='$sid' ";
	// $fb_query=mysqli_query($connection,$fb);
// 	while($fb_fetch=mysqli_fetch_array($fb_query))
// 	 {
// 	 	$fb_ID=$fb_fetch['comp_ID'];
// echo "<tr><td><a href='history_reply.php?sid=$sid&compid=$fb_ID'>You Replied to a Complaint ID $fb_ID at {$fb_fetch['fd_dtime']}</a></td></tr>";
  	 // }
echo "<tr><td><a href='history_reply.php?sid=$sid&compid={$replied_fetch['comp_ID']}'>You Replied to Complainant {$replied_fetch['complainant_ID']}</a></td></tr>";
		}
		echo "</table>";
		?>
</div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><div id="online_status">
	 
</div> </td>
</tr>

</div> 
<div id="footer"></div>
  
</div> 
<?php }else{header("location: login.php"); }
}?>
</body>
</html>