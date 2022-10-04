<?php require_once("DB.php");?>
<?php require_once("functions.php");?>
<?php require_once("sessions.php");?>
<?php 
	if(isset($_POST["submit"]))
	{
	  
		global $ConnectingDB;
		$sql="DELETE FROM main ";
		$execute=$ConnectingDB->query($sql);

		 if($execute)
		 {

			 $_SESSION["successmessage"]="table deleted successfully";
			 Redirect_to("main.php");
		 }
		 else
		 {
			 $_SESSION["errormessage"]="ERROR please try again";
			 Redirect_to("main.php");
		 }
	 
	 
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/ec4472c738.js" crossorigin="anonymous"></script>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css">
		<title>Delete</title>
	</head>
<body class="bg-dark text-white">
<?php
?>
<!-- header-->
	<div style="height:10px; background:#3366ff;"></div>
<form action="delete.php" method="post">
	 <div class="container">
	  <div class="row"> 
	    <div class="col-md-12"><br><br>
	  	 <h1> ARE YOU SURE YOU WANT TO DELETE</h1><br><br>
		</div>

		<div class="col-lg-2 mb-2">
		<button type="submit" name="submit" class="btn btn-success btn-block">
		<b>YES</b> <i class="fas fa-trash"></i>
	    </button>
		</div>
		<div class="col-lg-2 mb-2">

		 <a href="view.php" class="btn btn-danger btn-block">
		 <b>NO</b>   
		 </a>

		<br><br>
		</div>		
	  </div>
	 </div>
</form>
		<div style="height:10px; background:#3366ff;"></div>
<!-- header end-->




	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
		$('#year').text(new Date().getFullYear());
	</script>
</body>
</html>