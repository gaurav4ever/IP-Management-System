<!DOCTYPE html>
<html>
<head>
	<title>Show Details</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
</head>
<body>
<img src="img/nic.png" style="width:100%"><br/><br/>

<?php 
		
		if(isset($_POST['search'])){

			require 'connect.php';
			$text=$_POST['searchtext'];

		$sql1="SELECT * FROM `nic_worker_info` WHERE username='$text'";

		mysql_select_db("nic database");
		$retval1=mysql_query($sql1);
		if(!$retval1){
			die('No such record...<br>'.mysql_error());
		}
		else{
			$mquery=mysql_fetch_array($retval1);
			if($mquery['username']=="")echo "No such record...<br> ";
			else{
			$text='
				<div class="container" style="height:400px;">
						<h1 class="header">User Details</h1><br/>
						
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Username: </div>
								'.$mquery["username"].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Ip Add. :</div>
								'.$mquery["IP"].'	
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Location: </div>
								'.$mquery['location'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Intercom: </div>
								'.$mquery['intercom'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Division: </div>
								'.$mquery['division'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Designation: </div>
								'.$mquery['designation'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">AntiVirus: </div>
								'.$mquery['antivirus'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">MAC: </div>
								'.$mquery['MAC'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Non Nic/ Coordinator: </div> 
								'.$mquery['Non NIC/ Coordinator'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Connected/ Switch: </div>
								'.$mquery['connected/ switch'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Issue Date: </div>
								'.$mquery['issue date'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Reason for change IP: </div>
								'.$mquery['reason for change Ip'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Verify IP in NULL: </div>
								'.$mquery['verify Ip in NULL'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Old user detail: </div>
								'.$mquery['Old user detail'].'
							</div>
						</div>
				</div>
			';
			echo $text;
		}
	}
	}
 ?>
<center>
	<BUTTON><a href="database_view.php">Go Back</a></BUTTON>
</center>

</body>
</html>