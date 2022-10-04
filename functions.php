<?php
 function Redirect_to($New_location)
 {
  header("Location:".$New_location);
  exit;
 }
 function checkusernameexist($username)
 {
	 global $ConnectingDB;
	 $sql="SELECT username FROM admins WHERE username=:username";
	 $stmt=$ConnectingDB->prepare($sql);
	 $stmt->bindValue(':username',$username);
	 $stmt->execute();
	 $result=$stmt->rowcount();
	 if($result==1)
	 {
		 return true;
	 }		 
	 else
	 {
		 return false;
	 }
	 
 }

?>