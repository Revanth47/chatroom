<?php		
	include 'connect.php';
	if(isset($_SESSION['username']))
	{	
		$user=$_SESSION['username'];
		if(isset($_POST['chatroom']))
		{
			$cr=$_POST['chatroom'];
		}
		else
		{
			$cr='chatroom A';
		}
		$_SESSION['croom']=$cr;
		$qry="UPDATE chat SET room='".$cr."' WHERE user='".$user."'";
		$result=mysqli_query($db_server,$qry);
		echo"
			<html>
			<head>
				<title>Chat Away</title>
			</head>
			<body onload='fun()'>
				<meta charset='utf-8'>
				<meta name='viewport' width='device-width,initial-scale=1'>
				<script type='text/javascript' src='js/bootstrap.min.js'></script>
				<script type='text/javascript'>
			function fun(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				document.getElementById('div6').innerHTML=xmlhttp.responseText;
    			}
    		}
			xmlhttp.open('POST','update.php',true);
			xmlhttp.send();setTimeout(fun,5000);
			}
			
		</script>
				<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
				<link href='delta_css.css' rel='stylesheet' type='text/css'>
				<div id='div1'>
					<h1><strong>Chat Away</strong></h1>
				</div>
				<div id='div7'>
					<h4><strong>Hi! ".$user." </strong></h4>
					<a href='delta_logout.php'>Logout</a>
				</div>
				<div id='div4'>
				<form class='form-horizontal' role='form' method='post' action='room.php'>
					<input type='submit' name='chatroom' class='btn btn-primary btn-lg'value='chatroom A'><br><br>
					<input type='submit' name='chatroom' class='btn btn-primary btn-lg'value='chatroom B'><br><br>
					<input type='submit' name='chatroom' class='btn btn-primary btn-lg'value='chatroom C'><br>
				</form>
				</div>";
			echo"
				<div id='div6'>
				";
			$qry="SELECT user,la,status FROM chat WHERE room='".$cr."'";
			$result=mysqli_query($db_server,$qry);
			if(!isset($result))
				echo"No one is this chatroom. Please go to any other chatroom";	
			echo"
			</div>
			</body>
			</html>";
	}
	else
	header("Location:del_start.php");	
?>