<!DOCTYPE html>
<html>
<head>
	<title>Update IP</title>
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
	session_start();
		if(isset($_POST['search']) || isset($_POST['searchip'])){
		require 'connect.php';
		mysql_select_db("nic database");

		$text=$_POST['searchtext'];
		$ip=$_POST['searchtextip'];
		$_SESSION['text']=$text;
		$_SESSION['ip']=$ip;

		$sql1="SELECT * FROM `nic_worker_info` WHERE username='$text' AND isHistory=0";
		$sql2="SELECT * FROM `nic_worker_info` WHERE ip='$ip' AND isHistory=0";

		//random IP generation function PHP
		$sql_ip = "SELECT * FROM `nic_worker_info` WHERE username='Free IP Address'"; 
		$retval_ip=mysql_query($sql_ip);
		if($retval_ip){
			$a=array();
			while($mquery_ip=mysql_fetch_array($retval_ip)){
				$b=array($mquery_ip['division'],$mquery_ip['IP']);
				array_push($a,$b);
			}
		}
		else die("connection error!");
		
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
								$ip_array=array($mquery1['IP'],$mquery1['division']);
								echo $mquery1['division'];
								$user=$mquery1['user'];

								$sql_user="SELECT * from `user_info` where username='$user'";
								$retval_user=mysql_query($sql_user);
								if(!$retval_user)
									die("SERVER Error");
								$mquery_user=mysql_fetch_array($retval_user);

							$text='<form method="post" action="history.php">
							<div class="container" style="height:400px;">
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Username: </div>
											<input name="username" value="'.$mquery1["username"].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Ip Add. :</div>
											<input name="ip" id="searchtext1" value="'.$mquery1["IP"].'">
												
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Mobile Number: </div>
											<input name="mobile" value="'.$mquery_user['mobile number'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Email ID : </div>
											<input name="email" value="'.$mquery_user['email'].'">
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
											<input name="division" id="division_text" value="'.$mquery1['division'].'" >
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Division change: </div>
										
											<select name="division_select" id="box" onChange="getIP(this.value)">
												<option onclick="defaultIP()" selected>Default Division</option>
												<option name=" INOC" onclick="getIP()">INOC</option>
												<option name="lib" onclick="getIP()">Library</option>
												<option name="ssk" onclick="getIP()">SSK</option>
											</select>
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Designation: </div>
											<input name=" designation" value="'.$mquery1['designation'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">AntiVirus: </div>
											<input  name="antiVirus" value="'.$mquery1['antivirus'].'">
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">MAC: </div>
											<input name="mac" value="'.$mquery1['MAC'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Non Nic/ Coordinator: </div> 
											<input name="nonNic" value="'.$mquery1['Non NIC/ Coordinator'].'">
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Connected/ Switch: </div>
											<input name="connectedSwitch" value="'.$mquery1['connected/ switch'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Issue Date: </div>
											<input name="issueDate" value="'.$mquery1['issue date'].'">
											
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Reason for change IP: </div>
											<input name="changeIp" value="'.$mquery1['reason for change Ip'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Verify IP in NULL: </div>
											<input name="verifyIp" value="'.$mquery1['verify Ip in NULL'].'">
											
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Old user detail: </div>
											<input name="oldUserDetails" value="'.$mquery1['Old user detail'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Issued By : </div>
											<input name="issuedBy" value="'.$mquery1['Issued By'].'">
										</div>
									
									</div>
									<div class="row">
									<div class="col" style="float:left">
											<div class="text_field">Connected Port: </div>
											<input name="connectedPort" value="'.$mquery1['connected port'].'">
											
										</div>
									</div>
									<center>
									<br><br>
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
							$ip_array=array($mquery2['IP'],$mquery2['division']);
							$user=$mquery2['user'];
							$sql_user="SELECT * from `user_info` where username='$user'";
								$retval_user=mysql_query($sql_user);
								if(!$retval_user)
									die("SERVER Error");
								$mquery_user=mysql_fetch_array($retval_user);

							echo "Username and IP did not match..<br>showing result based on IP<br><br>";
							$text='
							<form method="post" action="history.php">
							<div class="container" style="height:400px;">
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Username: </div>
											<input name="username" value="'.$mquery2["username"].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Ip Add. :</div>
											<input name="ip" id="searchtext1" value="'.$mquery2["IP"].'">
												
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Mobile Number: </div>
											<input name="mobile" value="'.$mquery_user['mobile number'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Email ID : </div>
											<input name="email" value="'.$mquery_user['email'].'">
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
											<input name="division" id="division_text" value="'.$mquery2['division'].'" >
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Division: </div>
											<select name="division_select" id="box" onChange="getIP(this.value)">
												<option selected>Default Division</option>
												<option name=" INOC" onclick="getIP()">INOC</option>
												<option name="lib" onclick="getIP()">Library</option>
												<option name="ssk" onclick="getIP()">SSK</option>
											</select>
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Designation: </div>
											<input name=" designation" value="'.$mquery2['designation'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">AntiVirus: </div>
											<input  name="antiVirus" value="'.$mquery2['antivirus'].'">
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">MAC: </div>
											<input name="mac" value="'.$mquery2['MAC'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Non Nic/ Coordinator: </div> 
											<input name="nonNic" value="'.$mquery2['Non NIC/ Coordinator'].'">
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Connected/ Switch: </div>
											<input name="connectedSwitch" value="'.$mquery2['connected/ switch'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Issue Date: </div>
											<input name="issueDate" value="'.$mquery2['issue date'].'">
											
										</div>
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Reason for change IP: </div>
											<input name="changeIp" value="'.$mquery2['reason for change Ip'].'">
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Verify IP in NULL: </div>
											<input name="verifyIp" value="'.$mquery2['verify Ip in NULL'].'">
											
										</div>
										
									</div>
									<div class="row">
										<div class="col" style="float:left">
											<div class="text_field">Old user detail: </div>
											<input name="oldUserDetails" value="'.$mquery2['Old user detail'].'">
											
										</div>
										<div class="col" style="float:right">
											<div class="text_field">Issued By : </div>
											<input name="issuedBy" value="'.$mquery2['Issued By'].'">
										</div>
									</div>
									<div class="row">
									<div class="col" style="float:left">
											<div class="text_field">Connected Port: </div>
											<input name="connectedPort" value="'.$mquery2['connected port'].'">
										</div>
									</div>
									<br>
									<center><button type="submit" name="add">Update</button></center>
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
		function getIP(value_division){
			var products = <?php echo json_encode( $a ) ?>;
			var ip=<?php echo json_encode($ip_array) ?>;
			var p=[];
			//alert(ip[0]+ip[1]);
			if(value_division=='Default Division'){
				// alert(ip[0]);
				document.getElementById("searchtext1").value=ip[0];
				document.getElementById("division_text").value=ip[1];	
			}
			else{
			for(var i=0;i<products.length;i++){
				if(products[i][0]==value_division){
					p.push(products[i][1]);
				}
			}
			var r=Math.floor((Math.random() * p.length-1) + 1);
			var ip=p[r];
			document.getElementById("searchtext1").value=ip;
			document.getElementById("division_text").value=document.getElementById("box").value;
			}
		}
		function defaultIP(){
			var ip=<?php echo json_encode($ip_array) ?>;
			alert(ip[0]);
			//document.getElementById("searchtext1").value=;
		}
	</script>

</body>
</html>