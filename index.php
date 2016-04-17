<?php
	require_once('config.php');
	if(isset($_SESSION['username']))
	{
		header("Location:room.php");
	}
?>
<html>
<head>
	<title>ChatAway!!!</title>
</head>
<body>
	<meta charset='utf-8'>
	<meta name='viewport' width='device-width,initial-scale=1'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='css/style.css'>
	<div class="heading">
		<h1><strong>ChatAway!!!</strong></h1>
	</div>
	<div id='index-form'>
		<form class='form-horizontal' id='login' role='form' method='post' action='login.php'>
			<div class='row'>	
				<div class='form-group'>
					<div class='col-md-4'>
						<input type='text' id='user_name' class='form-control' name='user' placeholder='username'/>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-md-4'>
						<input type='password' id='user_pass' class='form-control' name='pass' placeholder='password'/>
					</div>	
				</div>
			</div>
			<div class='row'>
				<div class='form-group'>
					<div class='col-md-2'>
						<input type='submit' id='a1' value='Login'  class='btn btn-primary btn-block'>
					</div>
					<div class='col-md-2'>
						<input type='button' id='a1' value='Sign up' class='btn btn-primary btn-block' onclick="location.href='delta_signup.html'">
					</div>	
				</div>	
			</div>		
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#login').submit(function(e){
				login();
				return false;
			})
		});

		function login()
		{
			var user_name = $('#user_name').val();
			var user_pass = $('#user_pass').val();

			$.ajax({
				method :"POST",
				url    : "<?php echo $_ENV['base_path']?>" + "/login.php",
				data   : {
					user_name : user_name,
					user_pass : user_pass
				}

			}).done(function(msg){
				console.log(msg)
				if(msg.status == 1)
				{
					window.location = "<?php echo $_ENV['base_path']?>" + "/room.php"; 
				}
				else
				{
					alert('Invalid Credentials');
					$('#login')[0].reset();
				}
			}).fail(function(msg){
					alert('Invalid Credentials');
					$('#login')[0].reset();
			})
		}	
	</script>
</body>
</html>