<?php

$user_id = $_SESSION['user_id'];
$query   = "UPDATE users SET status='offline' WHERE user_id='".$user_id."'";

$result  = mysqli_query($_SERVER['conn'],$query);

session_unset();
session_destroy();

header("Location:index.php");
?>