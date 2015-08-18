<?php
include 'connect.php';
$name=mysqli_real_escape_string($db_server,$_POST['name']);
$age=mysqli_real_escape_string($db_server,$_POST['age']);
$sex=mysqli_real_escape_string($db_server,$_POST['sex']);
$qual=mysqli_real_escape_string($db_server,$_POST['qual']);
$email=mysqli_real_escape_string($db_server,$_POST['email']);
$user=mysqli_real_escape_string($db_server,$_POST['user']);
$password=sha1(mysqli_real_escape_string($db_server,$_POST['pass']));
$la='now()';
$qry="INSERT INTO chat(name,age,sex,qual,email,user,pass,la) VALUES('$name','$age','$sex','$qual','$email','$user','$password',$la)";
$result=mysqli_query($db_server,$qry);
$qry2="CREATE TABLE ".$user."(sender varchar(50),messages varchar(255),dt datetime,lm datetime,clear datetime)";
$result2=mysqli_query($db_server,$qry2);
if(isset($result))
{
	echo "Account was successfully created";
	header("location:delta_start.html");
}
else
	echo "Unable to create account".mysqli_error($db_server);
?>