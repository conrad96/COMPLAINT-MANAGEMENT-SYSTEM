<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
	<title></title>
</head>
<body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<h2>Example of creating Modals with Twitter Bootstrap</h2> <!-- Button trigger modal --> <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Launch demo modal </button> <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	 	<div class="modal-dialog"> 
	 		<div class="modal-content"> <div class="modal-header"> 
	 			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; 
	 			</button> 
	 			<h4 class="modal-title" id="myModalLabel"> This Modal title
		</h4> 
		</div> <div class="modal-body"> Add some text here </div> 
		<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
			<button type="button" class="btn btn-primary"> Submit changes </button> 
		</div> 
			</div><!-- /.modal-content --> 
		</div><!-- /.modal -->
	</div>
</body>
</html>
