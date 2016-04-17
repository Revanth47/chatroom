<?php

require 'session_check.php';

if(isset($_POST['message']))
{
	$message_from = $_SESSION['user_id'];
	$message_to   = $_SESSION['sender'];
	$message      = $_POST['message'];
	
	$query = "INSERT INTO messages(message_from,message_to,dt) VALUES('".$message_from."','".$message_to."','".$message."',now())";
	$result=mysqli_query($db_server,$qry);
	
	if(!$result)
		echo "Unable to send message".mysqli_error($db_server);
	$qry="UPDATE chat SET la=now() WHERE user='".$user."'";
	$result=mysqli_query($conn,$qry);
	if(!$result)
		echo "Unable to send message".mysqli_error($db_server);
	else
		header("Location:chat.php");
}
?>