<?php
include 'connect.php';
	$user=$_SESSION['username'];
	$sender=$_SESSION['sender'];
	$qry="";
	if(isset($_SESSION['chat']))
	{
		if($_SESSION['chat']!='full')
			$qry="SELECT * FROM ".$user." WHERE sender='".$sender."' AND clear IS NULL UNION all SELECT * FROM ".$sender." WHERE sender='".$user."' AND clear IS NULL ORDER BY dt";
		else
		{
	 		$qry="SELECT * FROM ".$user." WHERE sender='".$sender."' UNION all SELECT * FROM ".$sender." WHERE sender='".$user."' ORDER BY dt";	
			$_SESSION['chat']='not full';
		}

	}
		else
		{
	 	$qry="SELECT * FROM ".$user." WHERE sender='".$sender."' UNION all SELECT * FROM ".$sender." WHERE sender='".$user."' ORDER BY dt";	
		 $_SESSION['chat']='not full';
		}
	$result=mysqli_query($db_server,$qry);
	echo"<div>";
	while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
	{
		if($row['sender']==$user)
		echo "<font color='yellow'>".$row['sender'].":".$row['messages']."</font><br>";
		else
			echo "<font color='red'>".$row['sender'].":".$row['messages']."</font><br>";
	}
	echo"</div>";
	$qry="UPDATE ".$user." SET lm=now() WHERE sender='".$sender."'";
	$result=mysqli_query($db_server,$qry);
	if(!isset($result))
		echo "Unable to update chat".mysqli_error($db_server); 
	?>