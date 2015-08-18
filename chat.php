<?php
include 'connect.php';
if(isset($_SESSION['username']))
{
	if(isset($_POST['sender']))
	{
		$sender=$_POST['sender'];
		$_SESSION['sender']=$sender;
	}
	$user=$_SESSION['username'];
?>
		<html>
		<body onload="fun1()">
		<meta charset='utf-8'>
		<meta name='viewport' width='device-width,initial-scale=1'>
		<script type='text/javascript' src='js/bootstrap.min.js'></script>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
		<link href='delta_css.css' rel='stylesheet' type='text/css'>
		<div id='div7'>
			<h4><strong>Hi! <?php echo$user;?></strong></h4>
			<a href='delta_logout.php'>Logout</a><br>
			<a href='room.php'>Go Back</a><br>
			<a href='clear.php'>Clear ChatBox</a><br>
			<a href='upchat.php'>Unarchive Chat</a>
		</div>
		<div id='chatt'>
		<script type="text/javascript">
			function fun1(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				document.getElementById("chatt").innerHTML=xmlhttp.responseText;
    			}
    		}
			xmlhttp.open("POST","test.php",true);
			xmlhttp.send();setTimeout(fun1,5000);
			}
			
		</script>
		</div>
		<form class='form-inline' role='form' method='post' action='message.php'> 
		<div class='row'>
			<div class='form-group' id='div5'>
				<div class='col-lg-8'>
					<input type='text' class='form-control' onmouseout="fun2(this.value)" name='message' placeholder='Enter message here'>
				</div>
				<div class="col-md-4">
					<input type="submit" value="submit" class="btn btn-primary btn-block">
				</div>
			</div>
		</div></body></html>";
<?php
}
else
header("Location:del_start.php");		

?>
	
