<?php require_once("DB.php");?>
<?php require_once("functions.php");?>
<?php require_once("sessions.php");?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/ec4472c738.js" crossorigin="anonymous"></script>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css">
		<title>View</title>
	</head>
<body>
<?php
?>
<!-- header-->
	<div style="height:10px; background:#3366ff;"></div>
	<header class="bg-dark text-white py-3">
	 <div class="container">
	  <div class="row"> 
	    <div class="col-md-12">
	  	 <h1> View Table</h1>
		</div>

		<div class="col-lg-5 mb-2">
		 <a href="main.php" class="btn btn-success btn-block">
		 <i class="fas fa-file-upload"> Upload File</i> 
		 </a>
		</div>
		<div class="col-lg-5 mb-2">
		 <a href="delete.php" class="btn btn-danger btn-block">
		 <i class="fas fa-trash"> Delete Table</i>  
		 </a>
		</div>		
	  </div>
	 </div>
	</header>
		<div style="height:10px; background:#3366ff;"></div>
<!-- header end-->
<!-- main area begin-->
	<section class="container py-2 mb-4">
	 <div class="row">
	  <div class="col-lg-12">

	   <table class="table table-striped table-hover">
	    <thead class="thead-dark">
		 <tr>
		  <th>Date</th>
		  <th>Name</th>
		  <th>Amount</th>
		  <th>Type</th>
		  <th>Center</th>
		  </tr>
		</thead>
	    
		<?php 
		 global $ConnectingDB;
		 $sql="SELECT * FROM main ORDER BY date asc,type ";
		 $stmt=$ConnectingDB->query($sql);			
		 while($datarows=$stmt->fetch())
		 {
			 $date=$datarows["date"];
			 $date=$date{8}.$date{9}.$date{7}.$date{5}.$date{6}.$date{4}.$date{0}.$date{1}.$date{2}.$date{3};
			 $name=$datarows["name"];
			 $amount=$datarows["amount"];
			 $type=$datarows["type"];
			 $center=$datarows["center"];
		?>
		<tbody>
		<tr>
		 <td><?php echo $date; ?></td>
		 <td><?php echo $name; ?></td>
		 <td><?php echo $amount; ?></td>
		 <td><?php echo $type; ?></td>
		 <td><?php echo $center; ?></td>
		</tr>
		</tbody>
		 <?php } ?>
	   </table>
	  </div>
	 </div>
	</section>
<!-- main area end-->
	<!-- footer begin-->
	<div style="height:10px; background:#3366ff;"></div>
	<footer class="bg-dark text-white">
<br><br><br><br>
	</footer>
	<div style="height:10px; background:#3366ff;"></div>
	<!-- footer end-->




	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
		$('#year').text(new Date().getFullYear());
	</script>
</body>
</html>