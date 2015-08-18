<?php
include 'connect.php';
$user=$_SESSION['username'];
$qry2="UPDATE chat SET status='offline' WHERE user='".$user."'";
$result=mysqli_query($db_server,$qry2);
session_unset();
session_destroy();
header("Location:del_start.php");
?>