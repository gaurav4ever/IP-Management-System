	<!DOCTYPE html>
	<html>
	<head>
		<title>Release IP</title>
		<link rel="stylesheet" type="text/css" href="style/style_portal.css">
		<style type="text/css">
		table{
			width: 200%;
		}
		td{
			width: 150px;
			border: 1px solid #d1d1d1;
		}
		.names td{
			color: #3333ff;
			font-size: 18px;
		}
	</style>
	</head>
	<body>
	<img src="img/nic.png" style="width:100%">
	<div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
	</div>
	<button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000; text-decoration:none;">Back</a></button><br><br>
	<center>
 	<form method="post" action="relIP.php">
 		Input IP to release it.<br><br>
 		<input type="text" name="relip">
 		<button type="submit" name="button">Release</button>
 	</form>
 	<?php 
	session_start();
	if(isset($_POST['button'])){
	require 'connect.php';
	mysql_select_db("nic database");
	
			$auth_name=$_SESSION['username'];
			$ip=$_POST['relip'];
			$location=" ";
			$intercom=" ";
			$designation=" ";
			$antiVirus=" ";
			$mac=" ";
			$nonNiC=" ";
			$connectSwitch=" ";
			$connectPort=" ";
			$issueDate=" ";
			$reasonForChangeIp=" ";
			$verfiyIp=" ";
			$oldUserDetail=" ";
			$issuedby=" ";

			//current date and time
			date_default_timezone_set("Asia/Kolkata");
			$action_date=date("Y-m-d h:i:sa");

		$sql_current="SELECT * FROM `nic_worker_info` WHERE IP='$ip' AND isHistory=0";
		$retval_current=mysql_query($sql_current);
		if(!$retval_current)die("Server error");
		$mquery_current=mysql_fetch_array($retval_current);
		$division=$mquery_current['division'];

		if($mquery_current['username']!='Free IP Address'){

		$sql_old="UPDATE `nic_worker_info` SET `isHistory`=1 , `actionHappened`='released' , `actionDate`='$action_date' WHERE IP='$ip' AND isHistory=0";
		$retval_old=mysql_query($sql_old);
		if(!$retval_old)die("Server error");

		

		$query_new="INSERT INTO `nic_worker_info` (`IP`,`username`,`division`) VALUES ('$ip','Free IP Address','$division')";
		$retval_new=mysql_query($query_new);
		if(!$retval_new)die("Server Error");
		echo "<br>IP released Successfully...";
	}
	else echo "<br>IP is already free...";
		
	}


 ?>
 	</center>
	</body>
	</html>
