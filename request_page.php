<!DOCTYPE html>
<html>
<head>
	<title>Pending Request</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<img src="img/nic.png" style="width:100%">
	<div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
</div>
	<button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000;">Back</a></button><br>

<?php 

	require 'connect.php';

 	$query="SELECT * FROM `nic_worker_info` WHERE IP LIKE 'AA:%'";
 	$flag=0;
	if($is_query_run=mysql_query($query)){
			while($mquery=mysql_fetch_assoc($is_query_run)){
				
					$flag=1;
				$text='<br><form method="post" action="request_view.php">
						Request From :  
						<button type="submit" name="uname" value="'.$mquery['username'].'">'.$mquery['username'].'</button>
						</form>
				';
				echo $text;
			
			}
			if($flag==0){
				echo '<br><br><center>No Pending Request<br><br><a href="authority_portal.php">Back to Portal</a></center>';
		}
	} 
	else{
		echo "<br>query not executed...";
	}

 ?>
</body>
</html>