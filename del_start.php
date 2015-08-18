<?php
include 'connect.php';
if(isset($_SESSION['username']))
header("Location:room.php");
else
header("Location:delta_start.html");