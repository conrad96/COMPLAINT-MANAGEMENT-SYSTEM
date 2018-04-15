
function form(num){
	if(num === 1){
		document.getElementById("staff-div").style.display='block';	
		document.getElementById("admin-div").style.display='none';	
	}else if(num === 2){
		document.getElementById("admin-div").style.display='block';
		document.getElementById("staff-div").style.display='none';	
	}else{
		document.getElementById("staff-div").style.display='none';	
		document.getElementById("admin-div").style.display='none';
	}
	
}
function inbox(){
	document.getElementById("form_mail").style.display='block';
	var id=document.getElementById("reference").value;
	document.getElementById("form_refid").value=id;

}
//window.onload=show(1);