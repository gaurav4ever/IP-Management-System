<!DOCTYPE html>
<html>
<head>
	<title>Update IP</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<style type="text/css">
		#temp{
			visibility: hidden;
		}
		.form_request{
			height: 460px;
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
 	<form method="post" action="updateIP.php" action="submit">
				 Username : 
				<input type="text" name='searchtext' id="searchtext" placeholder="Enter Username" />
				<input type="submit" name="search" id="search" value="search"/>
				<br><br>
				Ip Address :
				<input type="text" name='searchtextip' id="searchtextip" placeholder="Enter IP" />
				<input type="submit" name="searchip" id="searchip" value="search"/><br><br>
				</form>
	</center>
<?php 
		if(isset($_POST['search']) || isset($_POST['searchip'])){
		$mysql_host='localhost';
		$mysql_user='root';
		$mysql_password='';

		$conn=mysql_connect($mysql_host,$mysql_user,$mysql_password);
		if((!$conn)){
			die('could not connect: '.mysql_error());
			}
		
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
			
						$mquery2=mysql_fetch_array($retval2);
						if($text=="" && $ip=="")die("Both field are empty...");
						elseif($text=="")echo "Username field empty...<br> ";
						elseif($ip=="")echo "IP field empty...<br> ";
						if($text==$mquery2['username'] || $ip==""){
							while($mquery1=mysql_fetch_array($retval1)){
							$text='<form method="post" action="approve_request.php">
							<div class="container" style="height:400px;">
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Username: </div>
											<input name="username" value="'.$mquery1["username"].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Ip Add. :</div>
											<input name="ip" value="'.$mquery1["IP"].'">
												
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Location: </div>
											<input name="location" value="'.$mquery1['location'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Intercom: </div>
											<input name="intercom" value="'.$mquery1['intercom'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Division: </div>
											<input name="division" value="'.$mquery1['division'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Designation: </div>
											<input name=" designation" value="'.$mquery1['designation'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">AntiVirus: </div>
											<input  name="antiVirus" value="'.$mquery1['antivirus'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">MAC: </div>
											<input name="mac" value="'.$mquery1['MAC'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Non Nic/ Coordinator: </div> 
											<input name="nonNic" value="'.$mquery1['Non NIC/ Coordinator'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Connected/ Switch: </div>
											<input name="connectedSwitch" value="'.$mquery1['connected/ switch'].'">
											
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Issue Date: </div>
											<input name="issueDate" value="'.$mquery1['issue date'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Reason for change IP: </div>
											<input name="changeIp" value="'.$mquery1['reason for change Ip'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Verify IP in NULL: </div>
											<input name="verifyIp" value="'.$mquery1['verify Ip in NULL'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Old user detail: </div>
											<input name="oldUserDetails" value="'.$mquery1['Old user detail'].'">
											
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Issued By : </div>
											<input name="issuedBy" value="'.$mquery1['Issued By'].'">
										</div>
										<div class="col" style="float:right">
											
										</div>
									</div>
									<center>
									<br><br><br><br>
									<button type="submit" name="add">Update</button>
									</center>
							</div>
							</form>
						';
						echo $text;	
						}
						echo '<br>';
						}
						else{
							echo "Username and IP did not match..<br>showing result based on IP<br><br>";
							$text='
							<form method="post" action="approve_request.php">
							<div class="container" style="height:400px;">
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Username: </div>
											<input name="username" value="'.$mquery2["username"].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Ip Add. :</div>
											<input name="ip" value="'.$mquery2["IP"].'">
												
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Location: </div>
											<input name="location" value="'.$mquery2['location'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Intercom: </div>
											<input name="intercom" value="'.$mquery2['intercom'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Division: </div>
											<input name="division" value="'.$mquery2['division'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Designation: </div>
											<input name=" designation" value="'.$mquery2['designation'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">AntiVirus: </div>
											<input  name="antiVirus" value="'.$mquery2['antivirus'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">MAC: </div>
											<input name="mac" value="'.$mquery2['MAC'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Non Nic/ Coordinator: </div> 
											<input name="nonNic" value="'.$mquery2['Non NIC/ Coordinator'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Connected/ Switch: </div>
											<input name="connectedSwitch" value="'.$mquery2['connected/ switch'].'">
											
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Issue Date: </div>
											<input name="issueDate" value="'.$mquery2['issue date'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Reason for change IP: </div>
											<input name="changeIp" value="'.$mquery2['reason for change Ip'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Verify IP in NULL: </div>
											<input name="verifyIp" value="'.$mquery2['verify Ip in NULL'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Old user detail: </div>
											<input name="oldUserDetails" value="'.$mquery2['Old user detail'].'">
											
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Issued By : </div>
											<input name="issuedBy" value="'.$mquery2['Issued By'].'">
										</div>
										<div class="col" style="float:right">
											
										</div>
									</div>
									<br><br><br>
									<button type="submit" name="add">Update</button>
							</div>
							</form>
						';
						echo $text;
						}
			}			
		}

	 ?>


<script type="text/javascript">
		function mFuntion(){

			var mValue=document.getElementById("temp").value;
			 document.getElementById("searchtext1").value=mValue;
		}
	</script>

</body>
</html>