<?php
include 'connect.php';
$user=$_SESSION['username'];
$sender=$_SESSION['sender'];
$qry="UPDATE ".$user." SET clear=now() WHERE sender='".$sender."'";
$result=mysqli_query($db_server,$qry);
$qry="UPDATE ".$sender." SET clear=now() WHERE sender='".$user."'";
$result=mysqli_query($db_server,$qry);
if(isset($result))
	header("Location:chat.php");
else
	echo"Unable to clear chat".mysqli_error($db_server);
?>