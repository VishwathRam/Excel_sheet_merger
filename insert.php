<?php
$con=mysqli_connect("localhost","root","","gpro");
if($con)
{
	$file=$_FILES['csvfile']['tmp_name'];
	$handle=fopen($file,'r');

	while(($cont=fgetcsv($handle,1000,","))!==false)
	{
		$query="INSERT INTO main(date,name,amount,type) VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]')";
		echo $query,"<br>";
		mysqli_query($con,$query);

	}
}
else
{
	echo "connection failed";
}

?>
