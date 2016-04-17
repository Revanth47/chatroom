<?php

$name     = mysqli_real_escape_string($_SERVER['conn'],$_POST['name']);
$age      = mysqli_real_escape_string($_SERVER['conn'],$_POST['age']);
$sex      = mysqli_real_escape_string($_SERVER['conn'],$_POST['sex']);
$email    = mysqli_real_escape_string($_SERVER['conn'],$_POST['email']);
$user     = mysqli_real_escape_string($_SERVER['conn'],$_POST['user']);
$password = sha1(mysqli_real_escape_string($_SERVER['conn'],$_POST['pass']));

$la = 'now()';
$query = "INSERT INTO users(name,age,sex,email,user,pass,la) VALUES('$name','$age','$sex','$email','$user','$password',$la)";

$result = mysqli_query($_SERVER['conn'],$query);

if(isset($result))
{
	echo "Account was successfully created";
	header("location:delta_start.html");
}
else
{
	echo "Unable to create account".mysqli_error($_SERVER['conn']);
}
?>