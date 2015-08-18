<?php
include 'connect.php';
$user=mysqli_real_escape_string($db_server,$_POST['user']);
$pass=mysqli_real_escape_string($db_server,$_POST['pass']);
$n=1;
$qry="SELECT pass FROM chat WHERE user='".$user."'";
$result=mysqli_query($db_server,$qry);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row['pass']==sha1($pass))
{
	$n=0;
	$qry2="UPDATE chat SET status='online' WHERE user='".$user."'";
	$result=mysqli_query($db_server,$qry2);
	$_SESSION['username']=$user;
	$_SESSION['password']=$pass;
	header("Location:room.php");
}
if($n==1)
echo"incorrect username/password".mysqli_error($db_server);
?>