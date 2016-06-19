<!DOCTYPE html>
<html>
<head>
	<title>Pending Request</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<style type="text/css">
 		#box{
 			width: 173px;
 			height: 21px;
 		}
 		

 	</style>
</head>
<body>
	<?php
	session_start();
	$user=$_SESSION['username'];
if(isset($_SESSION['s6'])){
	header('Location: worker_portal.php');
}
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
				$username=strtoupper(addslashes($_POST['s1']));
				$location=strtoupper(addslashes($_POST['s2']));
				$intercom=strtoupper(addslashes($_POST['s3']));
				$division=addslashes($_POST['division']);
				$designation=strtoupper(addslashes($_POST['s5']));
				$mac=addslashes($_POST['s6']);
			}
		else{
				$username=$_POST['s1'];
				$location=$_POST['s2'];
				$intercom=$_POST['s3'];
				$division=$_POST['division'];
				$designation=$_POST['s5'];
				$mac=$_POST['s6'];
		}
		// if($username==""||$location=="" ||$intercom==""||$division==""||$designation==""||$mac==""){
		// 	echo "Please Fill All The Fields";
		// 	header('Location: errors.php');
		// }




		$sql="INSERT INTO `NIC_worker_info` (`IP`, `username`, `location`, `intercom`, `division`, `designation`, `antivirus`, `MAC`, `Non NIC/ Coordinator`, `connected/ switch`, `issue date`, `reason for change Ip`, `verify Ip in NULL`, `Old user detail`,`Issued By`,`user`) VALUES ('AA:$mac','$username','$location','$intercom','$division','$designation','','$mac','','','','','','','','$user')";

		mysql_select_db("nic database");
		$retval=mysql_query($sql,$conn);
		if(!$retval){
			die('could not enter data<br>'.mysql_error());
		}
		$_SESSION['s6']=$mac;
		echo "Request Applied.<br>";
		echo '<a href="worker_portal.php">Back To Portal</a>';
		
		mysql_close($conn);

	}
	else{
		?>
		<form method="post" action="<?php $_PHP_SELF ?>">
		<img src="img/nic.png" style="width:100%">
		<div class="banner">
		<center>
			<a href="logout_worker.php"><p>Logout</p></a>
		</center>
		</div>
		<button style="height:25px;width:60px;"><a href="worker_portal.php" style="color:#000000;">Back</a></button>
<div class="container">

	<h1 class="header">Apply for New IP</h1><br/>
	
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Username* : </div>
			<input type="text" id="s1" name="s1" required>
		</div>
		<div class="col" style="float:right">
			<div class="text_field">Location: </div>
			<input type="text" id="s2" name="s2" required>
		</div>
	</div>
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Intercom* : </div>
			<input type="text" id="s3" name="s3" required>
		</div>
		<div class="col" style="float:right">
			<div class="text_field">Division* : </div>
		<select name="division" id="box">
			<option disabled>select division</option>
			<option name=" INOC">INOC</option>
			<option name="lib">Library</option>
			<option name="ssk">SSK</option>
		</select>
		</div>
	</div>	
	<div class="row">
		<div class="col" style="float:left">
			<div class="text_field">Designation: </div>
			<input type="text" id="s5" name="s5" required>
		</div>
		<div class="col" style="float:right">
			<div class="text_field">MAC* : </div>
			<input type="text" id="s6" name="s6" required>
		</div>
	</div>
	<br>
	<center>
	

		<button type="submit" id="add" name="add" onmouseover="check()" >Apply Request</button>
		<p>* : Mandatory Field.</p>
	</center>	
	</div>
	</form>
	<?php
}
?>

</body>
</html>