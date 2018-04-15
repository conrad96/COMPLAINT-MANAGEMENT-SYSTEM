<?php function clean($id,$password){
stripslashes($id);
stripslashes($password);
$n=str_replace('\'','',$id);
$e=str_replace('\'','',$password);
$n1=str_replace('--','',$n);
$e1=str_replace('--','',$e);
$n2=str_replace('/','', $n1);
$e2=str_replace('/','',$e1);
return array($n2,$e2);
}
function redirect($str=""){
	header("location: $str");
}
?>