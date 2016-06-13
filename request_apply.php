<!DOCTYPE html>
<html>
<head>
	<title>Pending Request</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
	if(isset($_POST['add'])){
		$mysql_host='localhost';
		$mysql_user='root';
		$mysql_password='';

		$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password);
		if((!$conn)){
			die('could not connect: '.mysql_error());
		}

		if(!get_magic_quotes_gpc() )
			{
				$username=addslashes($_POST['s1']);
				$location=addslashes($_POST['s2']);
				$intercom=addslashes($_POST['s3']);
				$division=addslashes($_POST['s4']);
				$designation=addslashes($_POST['s5']);
				$mac=addslashes($_POST['s6']);
			}
		else{
				$username=$_POST['s1'];
				$location=$_POST['s2'];
				$intercom=$_POST['s3'];
				$division=$_POST['s4'];
				$designation=$_POST['s5'];
				$mac=$_POST['s6'];
		}
		$sql="INSERT INTO `NIC_worker_info` (`IP`, `username`, `location`, `intercom`, `division`, `designation`, `antivirus`, `MAC`, `Non NIC/ Coordinator`, `connected/ switch`, `issue date`, `reason for change Ip`, `verify Ip in NULL`, `Old user detail`) VALUES ('','$username','$location','$intercom','$division','$designation','','$mac','','','','','','')";

		mysql_select_db("nic database");
		$retval=mysql_query($sql,$conn);
		if(!$retval){
			die('could not enter data<br>'.mysql_error());
		}
		echo "Request Applied.<br>";
		echo '<a href="worker_portal.html">Back To Portal</a>';
		mysql_close($conn);

	}
	else{
		?>
		<form method="post" action="<?php $_PHP_SELF ?>">
		<img src="img/nic.png" style="width:100%">
<div class="container">
	<h1 class="header">Apply for New IP</h1><br/>
	
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Username: </div>
			<input type="text" id="s1" name="s1">
		</div>
		<div class="col" style="float:right">
			<div class="text_field">Location: </div>
			<input type="text" id="s2" name="s2">
		</div>
	</div>
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Intercom: </div>
			<input type="text" id="s3" name="s3">
		</div>
		<div class="col" style="float:right">
			<div class="text_field">Division: </div>
			<input type="text" id="s4" name="s4">
		</div>
	</div>	
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Designation: </div>
			<input type="text" id="s5" name="s5">
		</div>
		<div class="col" style="float:right">
			<div class="text_field">MAC: </div>
			<input type="text" id="s6" name="s6">
		</div>
	</div>
	<br>
	<center>
		<input type="submit" id="add" name="add" value="Apply Request">
	</center>	
	</div>
	</form>
	<?php
	}

?>

</body>
</html>