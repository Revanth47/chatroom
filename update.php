<?php
			include 'connect.php';
			$user=$_SESSION['username'];
			$cr=$_SESSION['croom'];
			$qry="SELECT user,la,status FROM chat WHERE room='".$cr."'";
			$result=mysqli_query($db_server,$qry);
			echo"<form class='form-horizontal' role='form' method='post' action='chat.php'>
				<table class='table'>
					<tr>
						<th>Name</th>
						<th>New Messages</th>
						<th>Last Activity</th>
						<th>Status</th>
					</tr>";
				while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
				{
					if($user==$row['user'])
						continue;
					$qry3="SELECT * FROM ".$user." WHERE sender='".$row['user']."'";
					$result3=mysqli_query($db_server,$qry3);
					$row3=mysqli_fetch_array($result3,MYSQL_ASSOC);					
					$qry2="SELECT COUNT(messages) as nm FROM ".$user." WHERE sender='".$row['user']."' and dt >'".$row3['lm']."'";
					$result2=mysqli_query($db_server,$qry2);
					if($result2)
					{
						$row2=mysqli_fetch_array($result2,MYSQL_ASSOC);
					}
					echo"
						<tr>
							<td><input type='submit' name='sender' class='btn btn-danger btn-sm' value=".$row['user'].">";
							if(isset($row2['nm']))	
								echo"<td>".$row2['nm']."</td>";
							else
								echo"<td>No New Messages</td>";
							if(isset($row['la']))	
								echo"<td>".$row['la']."</td>";
							if(isset($row['status']))
								echo"<td>".$row['status']."</td>";
							else
								echo"<td>NA</td>

						<tr>";	
				}
				echo "</table></form>";
?>