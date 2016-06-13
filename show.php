<!DOCTYPE html>
<html>
<head>
	<title>Show Details</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
<img src="img/nic.png" style="width:100%"><br/><br/>

<?php 
		
		if(isset($_POST['search']) || isset($_POST['searchip'])){

			require 'connect.php';
			$text=$_POST['searchtext'];
			$ip=$_POST['searchtextip'];

		$sql1="SELECT * FROM `nic_worker_info` WHERE username='$text'";
		$sql2="SELECT * FROM `nic_worker_info` WHERE ip='$ip'";

		mysql_select_db("nic database");
		$retval1=mysql_query($sql1);
		$retval2=mysql_query($sql2);
		if(!$retval1 and !$retval2){
			die('No such record...<br>'.mysql_error());
		}
		else{
			$mquery1=mysql_fetch_array($retval1);
			$mquery2=mysql_fetch_array($retval2);
			if($mquery1['username']=="" && $mquery2['IP']=="")die("Both field are empty...");
			elseif($mquery1['username']=="")echo "Username field empty...<br> ";
			elseif($mquery2['IP']=="")echo "IP field empty...<br> ";
			if($mquery1['IP']==$mquery2['IP'] || $mquery2['IP']==""){
				$text='
				<div class="container" style="height:400px;">
						<h1 class="header">User Details</h1><br/>
						
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Username: </div>
								'.$mquery1["username"].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Ip Add. :</div>
								'.$mquery1["IP"].'	
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Location: </div>
								'.$mquery1['location'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Intercom: </div>
								'.$mquery1['intercom'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Division: </div>
								'.$mquery1['division'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Designation: </div>
								'.$mquery1['designation'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">AntiVirus: </div>
								'.$mquery1['antivirus'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">MAC: </div>
								'.$mquery1['MAC'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Non Nic/ Coordinator: </div> 
								'.$mquery1['Non NIC/ Coordinator'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Connected/ Switch: </div>
								'.$mquery1['connected/ switch'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Issue Date: </div>
								'.$mquery1['issue date'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Reason for change IP: </div>
								'.$mquery1['reason for change Ip'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Verify IP in NULL: </div>
								'.$mquery1['verify Ip in NULL'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Old user detail: </div>
								'.$mquery1['Old user detail'].'
							</div>
						</div>
				</div>
			';
			echo $text;	
			}
			else{
				echo "Username and IP did not match..<br>showing result based on IP<br><br>";
			$text='
				<div class="container" style="height:400px;">
						<h1 class="header">User Details</h1><br/>
						
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Username: </div>
								'.$mquery2["username"].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Ip Add. :</div>
								'.$mquery2["IP"].'	
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Location: </div>
								'.$mquery2['location'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Intercom: </div>
								'.$mquery2['intercom'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Division: </div>
								'.$mquery2['division'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Designation: </div>
								'.$mquery2['designation'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">AntiVirus: </div>
								'.$mquery2['antivirus'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">MAC: </div>
								'.$mquery2['MAC'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Non Nic/ Coordinator: </div> 
								'.$mquery2['Non NIC/ Coordinator'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Connected/ Switch: </div>
								'.$mquery2['connected/ switch'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Issue Date: </div>
								'.$mquery2['issue date'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Reason for change IP: </div>
								'.$mquery2['reason for change Ip'].'
							</div>
						</div>
						<div class="row">
							<div class="col" style="float:left">
								<div class="text_field">Verify IP in NULL: </div>
								'.$mquery2['verify Ip in NULL'].'
							</div>
							<div class="col" style="float:right">
								<div class="text_field">Old user detail: </div>
								'.$mquery2['Old user detail'].'
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