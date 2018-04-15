<?php 
function clean($name,$email){
	stripslashes($name);
	stripslashes($email);
$n=str_replace('\'','',$name);
$e=str_replace('\'','',$email);
$n1=str_replace('--','',$n);
$e1=str_replace('--','',$e);
$n2=str_replace('/','', $n1);
$e2=str_replace('/','',$e1);
return array($n2,$e2);
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
	<title></title>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
	<table>
		<tr>
		<td><img src="../images/bou.jpg" id="logo"></td>
		<td><b><h1>BANK OF UGANDA</h1></b></td>
		</tr>
	</table>
</div>
<ul class="nav nav-tabs">
<li><a href="../index.php">Home</a></li>
 <li><a href="../about/about.php">About</a></li>
<li><a href="../about/staff.php">Respondent Staff</a> </li>	
 <li><a href="login.php">Login</a> </li>
 <li class="active" ><a href="feedback.php">Check Feedback</a></li>
 </ul>
<div id="about" class="well">
	<h3 class="panel-title">Feedback Page</h3>
</div>
 <div id="wrap">
 <table class="table"><tr><td>
 <div id="complaint_field">
<form action="feedback.php" method="POST" role="form">	
 <div class="form-group">
 <label for="name">Email:</label> 
 <input type="email" name="email" id="email" required="required" placeholder="...Valid Email Address" class="form-control"> 
 </div>
 <div class="form-group">
 <label for="pin">PIN:</label> 
 <input type="number" name="pin" id="pin" required="required" class="form-control" placeholder="...PIN"> 
  </div>
  <div class="form-group">
 <input type="submit" name="feedback" value="View Feedback" class="btn btn-default"> 
 </div>
</form>
	</div> 
</td>
	<?php if(isset($_POST['feedback'])){ 
	include("database.php");
	$email=$_POST['email'];
	$pin=$_POST['pin'];
	$data=clean($email,$pin);
		?>
	<td><div id="online_status">
 <?php 
//check if email & pin exists
 $secure=md5($data[1]);
$check="SELECT * FROM complainants WHERE email='$data[0]' AND pin='$secure' ";
  $check_query=mysqli_query($connection,$check);
//$check_fetch=mysqli_fetch_array($check_query);
//print_r($check_fetch);
if($check_fetch=mysqli_fetch_array($check_query)){
//now get the complaint and Reply from 2 tables(complaint & feedback)
//get the complaint	
	$complainant_ID=$check_fetch['complainant_ID'];
$complaint="SELECT * FROM complaints WHERE complainant_ID='$complainant_ID' ";
$complaint_query=mysqli_query($connection,$complaint);
echo "<table class='table'>";
while($complaint_fetch=mysqli_fetch_array($complaint_query)){
echo "<tr><td>Complaint Refence ID:</td>
<td><font color='red'>{$complaint_fetch['comp_ID']}</font></td>
</tr>";

echo "<tr><td>Complaint Date/Time:</td>
<td>{$complaint_fetch['comp_dtime']}</td>
</tr>";
echo "<tr><td>Complaint:</td>
<td>{$complaint_fetch['complaint_field']}</td>
</tr>";
echo "<tr><td>To:</td>
<td>{$complaint_fetch['staff_ID']}</td>
</tr>";
}
echo "</table>";
echo "<b class='wells'>Feedback</b><p>";
echo "<table class='table'>";
//getting feedback
$flag="SELECT * FROM feedback WHERE complainant_ID='$complainant_ID' ";
$flag_query=mysqli_query($connection,$flag);
$flag_fetch=mysqli_fetch_array($flag_query);
if($flag_fetch['fd_field']!=''){goto feedback;}else{
	echo "<h4 class='well'> <font color='red'>Feedback is Pending ..please try again later</font></h4> ";   }
feedback:
$feedback="SELECT * FROM feedback WHERE complainant_ID='$complainant_ID' ";
$feedback_query=mysqli_query($connection,$feedback);
while($feedback_fetch=mysqli_fetch_array($feedback_query))
{
	echo "<tr><td>Complaint Reference:</td>
<td><font color='red'>{$feedback_fetch['comp_ID']}</font></td>
</tr>";
	echo "<tr><td>Feedback Date/Time:</td>
<td>{$feedback_fetch['fd_dtime']}</td>
	</tr>";
	echo "<tr><td>Feedback</td>
<td>{$feedback_fetch['fd_field']}</td>
	</tr>";
	echo "<tr><td>From:</td>
<td>{$feedback_fetch['staff_ID']}</td>
	</tr>";
}
echo "</table>";
}else {
echo "<h4 class='well'><font color='red'>Email Address and Pin Doesnot Exist please Fill in Email and PIN Here<a href='../index.php'>Signup</a> ..</font></h4>";
}
 ?>
	</div></td></tr>
</div>
<?php } ?> 
 
 <div id="footer"></div> 
</div>
 
</body>
</html>