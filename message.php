<?php
include 'connect.php';
if(isset($_POST['message']))
{
	$user=$_SESSION['username'];
	$sender=$_SESSION['sender'];
	$message=$_POST['message'];
	$qry="INSERT INTO ".$sender."(sender,messages,dt) VALUES('".$user."','".$message."',now())";
	$result=mysqli_query($db_server,$qry);
	if(!$result)
		echo "Unable to send message".mysqli_error($db_server);
	$qry="UPDATE chat SET la=now() WHERE user='".$user."'";
	$result=mysqli_query($db_server,$qry);
	if(!$result)
		echo "Unable to send message".mysqli_error($db_server);
	else
		header("Location:chat.php");
}
?>