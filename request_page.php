<!DOCTYPE html>
<html>
<head>
	<title>Pending Request</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
</head>
<body>
	<img src="img/nic.png" style="width:100%">

<?php 

	require 'connect.php';

 	$query="SELECT * FROM `nic_worker_info`";
 	$flag=0;
	if($is_query_run=mysql_query($query)){
			while($mquery=mysql_fetch_assoc($is_query_run)){
				if($mquery['IP']==''){
					$flag=1;
				$text='<br><form method="post" action="request_view.php">
						<button type="submit" name="uname" value="'.$mquery['username'].'">'.$mquery['username'].'</button>
						</form>
				';
				echo $text;
			}
			}
			if($flag==0){
				echo '<br><br><center>No Pending Request<br><br><a href="authority_portal.html">Back to Portal</a></center>';
		}
	} 
	else{
		echo "<br>query not executed...";
	}

 ?>
</body>
</html>