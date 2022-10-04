<?php require_once("DB.php");?>
<?php require_once("functions.php");?>
<?php require_once("sessions.php");?>
<?php
global $ConnectingDB;
if(isset($_POST["submit"]))
{
	$file=$_FILES['csvfile']['tmp_name'];
	$handle=fopen($file,'r');

	while(($cont=fgetcsv($handle,1000,","))!==false)
	{
		$sql="INSERT INTO main(date,name,amount,type) VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]')";
		echo $sql,"<br>";
		$execute=$ConnectingDB->query($sql);
	
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

?>