<?php 
if(isset($_POST['submit'])){
include("database.php");
$category=$_POST['category'];  //get the submitted data(category and complaint)
$complaint=$_POST['complaint'];
$email=$_POST['email'];
$pin=md5($_POST['pin']);
//if(is_numeric($pin)){
$search="SELECT * FROM complainants WHERE email='$email' AND pin='$pin' ";
$search_query=mysqli_query($connection,$search);
$search_fetch=mysqli_fetch_array($search_query);
if($search_fetch){
$complainant_ID=$search_fetch['complainant_ID'];	
  $dept="SELECT * FROM staff WHERE department='$category' ";
  $dept_query=mysqli_query($connection,$dept);
  $dept_fetch=mysqli_fetch_array($dept_query);
  if($dept_fetch){
  $staff_ID=$dept_fetch['staff_ID'];
  $status="pending";
  $dtime=date("y/m/d h:m:s");
$insert_complaint="INSERT INTO complaints VALUES('','$complaint','$staff_ID','$status','$dtime','$complainant_ID')";
$insert_query=mysqli_query($connection,$insert_complaint);
if($insert_query){ header("location: feedback.php");
}else{
	echo "<script>alert('System Error ,Please Try Again Later');</script>";
}	
}else{
	echo "<h4 class='well'><font color='red'>Department Doesnot Exist, Try Again</font></h4>";
}
}else{
//creating a new complainant
$create="INSERT INTO complainants(complainant_ID,email,pin) VALUES('','$email','$pin')";
$create_query=mysqli_query($connection,$create);
if($create_query){
$get="SELECT * FROM complainants WHERE email='$email' AND pin='$pin' ";
$get_query=mysqli_query($connection,$get);
$get_fetch=mysqli_fetch_array($get_query);
$complainant_ID=$get_fetch['complainant_ID'];
 $dept="SELECT * FROM staff WHERE department='$category' ";
  $dept_query=mysqli_query($connection,$dept);
  $dept_fetch=mysqli_fetch_array($dept_query);
  if($dept_fetch){
  $staff_ID=$dept_fetch['staff_ID'];
  $status="pending";
  $dtime=date("y/m/d h:m:s");
$insert_complaint="INSERT INTO complaints VALUES('','$complaint','$staff_ID','$status','$dtime','$complainant_ID')";
$insert_query=mysqli_query($connection,$insert_complaint);
if($insert_query){ header("location: feedback.php");
}else{
	echo "<script>alert('System Error ,Please Try Again Later');</script>";
}	
}else{
	echo "<h4 class='well'><font color='red'>Department Doesnot Exist, Try Again</font></h4>";
}

header("location: feedback.php");
}else{
	echo "<script>alert('Failed to Register Credentials Please Try Again');</script>";
}

}

//}else{  echo "<script type='text/javascript'>alert('PIN should not contain Text,Please Try Again');</script>"; }
// if($category=='Other'){
// $category='Communication';
// //get the staffs, department and query for the staff's ID
// $str="SELECT * FROM staff WHERE department='$category' "; 
// $query=mysqli_query($connection,$str);
// $row=mysqli_fetch_array($query);
// $staff_ID=$row['staff_ID'];
// // $date=date("d/m/y");
// // $time=date("h:m:s");
// $dtime=date("y/m/d h:m:s");
// $status="pending";
// $str_complaint="INSERT INTO complaints (ref_ID,category,email,complaint_field,staff_ID,status,reply_time,comp_dtime,reply,reply_date) VALUES ('','$category','$email','$complaint','$staff_ID','$status','','$dtime','','' ) ";
// $str_query=mysqli_query($connection,$str_complaint);
// if($name==""){
// 	$name="Anonymous";
// $get_ref="SELECT * FROM complaints WHERE email='$email' ";
// $get_ref_query=mysqli_query($connection,$get_ref);
// $get_ref_fetch=mysqli_fetch_array($get_ref_query);
// $refid=$get_ref_fetch['ref_ID'];
// $input_user="INSERT INTO users VALUES('','$refid','$name','$email')";	
// $input_user_query=mysqli_query($connection,$input_user);
// }else{
// $get_ref="SELECT * FROM complaints WHERE email='$email' ";
// $get_ref_query=mysqli_query($connection,$get_ref);
// $get_ref_fetch=mysqli_fetch_array($get_ref_query);
// $refid=$get_ref_fetch['ref_ID'];
// $input_user="INSERT INTO users VALUES('','$refid','$name','$email')";	
// $input_user_query=mysqli_query($connection,$input_user);
// }

// if($str_query){header("location: feedback.php?refid=$refid");}else{ header("location: ../index.php");
// }
// }
// else{

// //below code is for inputtin into database wen the other categories(finance,IT etc) hve been selected except (Other)
// $str="SELECT * FROM staff WHERE department='$category' "; 
// $query=mysqli_query($connection,$str);
// $row=mysqli_fetch_array($query);
// $staff_ID=$row['staff_ID'];
//  $dtime=date("y/m/d h:m:s");
// $status="pending";
// $str_complaint="INSERT INTO complaints (ref_ID,category,email,complaint_field,staff_ID,status,reply_time,comp_dtime,reply,reply_date) VALUES ('','$category','$email','$complaint','$staff_ID','$status','','$dtime','','' ) ";
// $str_query=mysqli_query($connection,$str_complaint);
// //this piece of code is for inputtin the ref_ID nd email of user into user's table
// if($name==""){
// 	$name="Anonymous";
// $get_ref="SELECT * FROM complaints WHERE email='$email' ";
// $get_ref_query=mysqli_query($connection,$get_ref);
// $get_ref_fetch=mysqli_fetch_array($get_ref_query);
// $refid=$get_ref_fetch['ref_ID'];
// $input_user="INSERT INTO users VALUES('','$refid','$name','$email')";	
// $input_user_query=mysqli_query($connection,$input_user);
// }else{
// $get_ref="SELECT * FROM complaints WHERE email='$email' ";
// $get_ref_query=mysqli_query($connection,$get_ref);
// $get_ref_fetch=mysqli_fetch_array($get_ref_query);
// $refid=$get_ref_fetch['ref_ID'];
// $input_user="INSERT INTO users VALUES('','$refid','$name','$email')";	
// $input_user_query=mysqli_query($connection,$input_user);
// }


// if($str_query){header("location: feedback.php?refid=$refid");}else{ header("location: ../index.php");}
// }


}
?>