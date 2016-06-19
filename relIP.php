<?php 
	session_start();
	if(isset($_POST['button'])){
	$auth_name=$_SESSION['username'];
	require 'connect.php';
	$ip=$_POST['relip'];
	$location="";
	$intercom="";
	$designation="";
	$antiVirus="";
	$mac="";
	$nonNiC="";
	$connectSwitch="";
	$issueDate="";
	$reasonForChangeIp="";
	$verfiyIp="";
	$oldUserDetail="";
	$issuedby="";

	$query="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='Free IP Address',`location`='$location',`intercom`='$intercom',`designation`='$designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verfiyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby' WHERE IP='$ip'" ;
	if($is_query_run=mysql_query($query)){
			echo "IP Released Successfully...";
		}
	
	else{
		echo "IP did not Released!";
	}
}
 ?>
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
 	</center>
	</body>
	</html>
