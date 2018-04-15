<?php include("header.php"); ?> 
<div id="about" class="well">
	<h3>COMPLAINT MANANGEMENT SYSTEM</h3>
</div>
<center>
<input type="button" name="btn" id="show_form" value="Continue">
<div id="form" >

		<p>Choose Section:</p>
	<input type="image" name="img" id="close_form" src="img/close.png">
	<!-- <input type="button" name="complainant" id="complainant" value="Complainant">
	<input type="button" name="complainant" id="Staff" value="Staff"> -->
	 <table class="table">
		<tr>
			<td> 
			<section class="grad-btn"><button href="complaint.php"  onclick="window.location.href='includes/complaint.php';">Complaint</button></section></td>
			<td>
			<section class="grad-btn"><button href="includes/login.php" onclick="window.location.href='includes/login.php';"  >Staff</button>
			</section></td>

		</tr>
	</table>

</div>
</center>
<?php include("footer.php"); ?>
</body>
</html>