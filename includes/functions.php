<?php 
function clean($username,$password){
	$uname1=str_replace('\'','',$username);
	$uname2=str_replace("'",'',$uname1);
	$pwd1=str_replace("'",'',$password);
	$pwd2=str_replace('\'','',$pwd1);
	return $uname2.'|'.$pwd2;
}
?>