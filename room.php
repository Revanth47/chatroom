<?php		
	require 'session_check.php';
	
	$user = $_SESSION['user_name'];
	
	if(isset($_POST['chatroom']))
	{
		$_SESSION['chatroom'] = $_POST['chatroom'];
	}
	else
	{
		$_SESSION['chatroom'] = 'chatroom A';
	}
?>
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
	<link href='css/index.css' rel='stylesheet' type='text/css'>
	<div id='div1'>
		<h1><strong>Chat Away</strong></h1>
	</div>
	<div id='div7'>
		<h4><strong>Hi! "<?php echo $user?>" </strong></h4>
		<a href='logout.php'>Logout</a>
	</div>
	<div id='div4'>
		<form class='form-horizontal' role='form' method='post' action='room.php'>
			<input type='submit' name='chatroom' class='btn btn-primary btn-lg' value='chatroom A'><br><br>
			<input type='submit' name='chatroom' class='btn btn-primary btn-lg' value='chatroom B'><br><br>
			<input type='submit' name='chatroom' class='btn btn-primary btn-lg' value='chatroom C'><br>
		</form>
	</div>
</body>
</html>