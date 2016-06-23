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
		$mysql_host='localhost';
		$mysql_user='root';
		$mysql_password='';

		$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password);
		if((!$conn)){
			die('could not connect: '.mysql_error());
		}
			$auth_name=$_SESSION['username'];
			$ip=$_POST['relip'];
			$location=" ";
			$intercom=" ";
			$designation=" ";
			$antiVirus=" ";
			$mac=" ";
			$nonNiC=" ";
			$connectSwitch=" ";
			$issueDate=" ";
			$reasonForChangeIp=" ";
			$verfiyIp=" ";
			$oldUserDetail=" ";
			$issuedby=" ";

	

	$query="UPDATE `nic_worker_info` SET `username`='Free IP Address',`location`=' ',`intercom`=' ',`designation`=' ',`antivirus`=' ',`MAC`=' ',`Non NIC/ Coordinator`=' ',`connected/ switch`=' ',`issue date`=' ',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verfiyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby' WHERE IP='$ip'" ;

	mysql_select_db("nic database");

	$retval=mysql_query($query,$conn);

	if(!$retval){
			die('IP did not Released...<br>'.mysql_error());
		}
	else{
		echo "<br>IP released successfully...";
	}
}

 ?>
 	</center>
	</body>
	</html>
