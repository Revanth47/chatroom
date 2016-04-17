<?php
require_once 'config.php';

$conn = mysqli_connect($_ENV['db_hostname'],$_ENV['db_username'],$_ENV['db_password'],$_ENV['db_database']) 
                                            or die("Unable to connect to server".mysqli__connect_error());

$_SERVER['conn'] = $conn;

$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
$user_pass = mysqli_real_escape_string($conn,$_POST['user_pass']);

if(empty($user_name) || empty($user_pass))
{
    http_response_code(400);
}

$query = "SELECT * FROM users WHERE user_name='".$user_name."'";

$result = mysqli_query($conn,$query);

$user = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($user['user_pass']==sha1($user_pass))
{
    session_start();
 
    $_SESSION['user_id']   = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    
	$query = "UPDATE users SET status='online' WHERE user_id='".$user['user_id']."'";

	$result = mysqli_query($conn,$query);
    
    http_response_code(200);
    header("Content-type: application/json");

    $response = new stdClass;
    $response->status = 1;
    $response->data   = "Successful Authentication";
    echo json_encode($response);	
}
else 
{
    http_response_code(400);
}
?>