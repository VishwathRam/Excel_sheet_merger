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
		<title>Home</title>
	</head>
<body>
<?php
?>
<!-- header-->
	<div style="height:13px; background:#3366ff;"></div>
	<header class="bg-dark text-white py-3">
	 <div class="container">
	  <div class="row"> 
	    <div class="col-md-12">
	  	 <h1><i class="fas fa-home" style="color:#3366ff;"></i> Main Page</h1>
		</div>
	  </div>
	 </div>
	</header>
	<div style="height:13px; background:#3366ff;"></div>
<!-- header end-->
<!-- main area begin-->
	<section class="container py-2 mb-4">
		<div class="row"> <!--style="min-height:50px; background:red;" -->
		 <div class="offset-lg-1 col-lg-10 style="min-height:400px;"> <!-- background:yellow;" -->
	  	<?php
		echo errormessage();
		echo successmessage();
		?>
		  <form action="main.php" method="post" enctype="multipart/form-data">
		   <div class="card bg-secondary text-light mb-3">
		    <div class="card-header">
		     <h1>Choose File:</h1>
		    </div>
			<div class="card-body bg-dark">
		     <div class="form-group">
			 <div class="custom-file ">
				<input type="file" name="csvfile" required="required">
		     </div>
			 </div>
			 <div class="form-group">
			 	<label for="title"><span class="FieldInfo">Choose Center:</span></label><br>
				<input class="radio" type="radio" name="center" value="Kelambakkam"> Kelambakkam	
				<input class="radio" type="radio" name="center" value="Padur"> Padur
		     </div>

		     <div class="form-group col-lg-3 mb-3">
				<button type="submit" name="submit" class="btn btn-success btn-block" value="UPLOAD">
			     Submit
			   </button>
			 </div>			 
		<div class="container">
		<div class="row">
		<div class="col-lg-5 mb-2">
		 <a href="view.php" class="btn btn-info btn-block">
		 <i class="fas fa-file"> View Table</i> 
		 </a>
		</div>
		<div class="col-lg-5 mb-2">
		 <a href="delete.php" class="btn btn-danger btn-block">
		 <i class="fas fa-trash"> Delete Table</i> 
		 </a>
		 </div>
		 </div></div>
		    </div>
		   </div>
		  </form>
		 </div>
		</div>
	</section>
<!-- main area end-->
	<!-- footer begin-->
	<div style="height:13px; background:#3366ff;"></div>
	<footer class="bg-dark text-white">
<br><br><br><br><br>
	</footer>
	<div style="height:13px; background:#3366ff;"></div>
	<!-- footer end-->
	<!-- <input class="custom-file-input" type="file" name="csvfile" required="required" id="fileselect">
				<label for="fileselect" class="custom-file-label">Select File:</label>
				<div id="file-upload-filename"></div>
				-->



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
		$('#year').text(new Date().getFullYear());
	</script>
</body>
</html>
<?php
global $ConnectingDB;
if(isset($_POST["submit"]))
{
	$center=$_POST["center"];
	$file=$_FILES['csvfile']['tmp_name'];
	$handle=fopen($file,'r');

	if(empty($center))
	 {
		$_SESSION["errormessage"]="Please select center";
		Redirect_to("main.php"); 
	 }
	else
	{
	while(($cont=fgetcsv($handle,1000,","))!==false)
	{
		$cont[0]=str_replace("/","-",$cont[0]);	
		if($cont[0]{1}=='-')
		{
			$cont[0]="0".$cont[0];
		}
		$cont[0]=str_replace("/","-",$cont[0]);	
		if($cont[0]{4}=='-')															
		{																				
			if(strlen($cont[0])==9)
			{
				$cont[0]=$cont[0]{5}.$cont[0]{6}.$cont[0]{7}.$cont[0]{8}.$cont[0]{4}."0".$cont[0]{3}.$cont[0]{2}.$cont[0]{0}.$cont[0]{1};
			}
			else
			{
				$cont[0]="2"."0".$cont[0]{5}.$cont[0]{6}.$cont[0]{4}."0".$cont[0]{3}.$cont[0]{2}.$cont[0]{0}.$cont[0]{1};
			}
		}
		else
		{
			if(strlen($cont[0])==10)
			{
				$cont[0]=$cont[0]{6}.$cont[0]{7}.$cont[0]{8}.$cont[0]{9}.$cont[0]{5}.$cont[0]{3}.$cont[0]{4}.$cont[0]{2}.$cont[0]{0}.$cont[0]{1};
			}
			else
			{
				$cont[0]="2"."0".$cont[0]{6}.$cont[0]{7}.$cont[0]{5}.$cont[0]{3}.$cont[0]{4}.$cont[0]{2}.$cont[0]{0}.$cont[0]{1};
			}
		}
		$sql="INSERT INTO main(date,name,amount,type,center) VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]',:center)";
		$stmt=$ConnectingDB->prepare($sql);
		 $stmt->bindValue(':center',$center);
		//echo $sql,"<br>";
		$execute=$stmt->execute();
		//$execute=$ConnectingDB->query($sql);
	
	}
	if($execute)
		 {

			 $_SESSION["successmessage"]="file added successfully";
			 Redirect_to("main.php");
		 }
	else
		 {
			 $_SESSION["errormessage"]="ERROR please try again";
			 Redirect_to("main.php");
		 }
	}
}

?>