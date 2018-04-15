<?php 
if(isset($_POST['submit'])){
include("database.php");
$name=$_POST['name'];
$email=$_POST['email'];
$cred=clean($name,$email);
$search="SELECT * FROM users WHERE name='$cred[0]' AND email='$cred[1]' ";
$query=mysqli_query($connection,$search);
$row=mysqli_fetch_array($query);
if($row){

	
	}else{}

}
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