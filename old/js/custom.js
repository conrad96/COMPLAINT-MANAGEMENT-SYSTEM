$(document).ready(function()
{
 $("#show_form").click(function(){
  showpopup();
 });
 $("#close_form").click(function(){
  hidepopup();
 });
 
$("#complaint_btn").on('click',function(event){
event.preventDefault();
var url=$(this).data("target");
location.replace(url);
	});
 
});

function showpopup()
{
 $("#form").fadeIn();
 $("#form").css({"visibility":"visible","display":"block"});
}

function hidepopup()
{
 $("#form").fadeOut();
 $("#form").css({"visibility":"hidden","display":"none"});
}
function redirect(){
	
}