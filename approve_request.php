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
			    $ip=addslashes($_POST['ip']);
				$username=strtoupper(addslashes($_POST['username']));
				$location=strtoupper(addslashes($_POST['location']));
				$intercom=strtoupper(addslashes($_POST['intercom']));
				$division=strtoupper(addslashes($_POST['division']));
				$designation=strtoupper(addslashes($_POST['designation']));
				$antiVirus=strtoupper(addslashes($_POST['antiVirus']));
				$mac=addslashes($_POST['mac']);
				$nonNiC=strtoupper(addslashes($_POST['nonNic']));
				$connectSwitch=strtoupper(addslashes($_POST['connectedSwitch']));
				$connectPort=strtoupper(addslashes($_POST['connectedPort']));
				$issueDate=strtoupper(addslashes($_POST['issueDate']));
				$reasonForChangeIp=strtoupper(addslashes($_POST['changeIp']));
				$verfiyIp=strtoupper(addslashes($_POST['verifyIp']));
				$oldUserDetail=strtoupper(addslashes($_POST['oldUserDetails']));
				$issuedby=strtoupper(addslashes($_POST['issuedBy']));

			}
			else{
				$ip=$_POST['ip'];
				$username=strtoupper($_POST['username']);
				$location=strtoupper($_POST['location']);
				$intercom=strtoupper($_POST['intercom']);
				$division=strtoupper($_POST['division']);
				$designation=strtoupper($_POST['designation']);
				$antiVirus=strtoupper($_POST['antiVirus']);
				$nonNiC=strtoupper($_POST['nonNic']);
				$mac=$_POST['mac'];
				$issueDate=strtoupper($_POST['issueDate']);
				$connectSwitch=strtoupper($_POST['connectedSwitch']);
				$connectPort=strtoupper(addslashes($_POST['connectedPort']));
				$reasonForChangeIp=strtoupper($_POST['changeIp']);
				$verfiyIP=strtoupper($_POST['verfiyIp']);
				$oldUserDetail=strtoupper($_POST['oldUserDetails']);
				$issuedby=strtoupper($_POST['issuedBy']);
			}

			$sql="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='$username',`location`='$location',`intercom`='$intercom',`division`='$division',`designation`='$designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`connected port`='$connectPort',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verfiyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby' WHERE IP='$ip'";

			$sql_del="DELETE FROM `nic_worker_info` WHERE flag=1";

			mysql_select_db("nic database");
			
		$retval=mysql_query($sql,$conn);
		$retval_del=mysql_query($sql_del,$conn);
		if(!$retval){
			die('could not enter data<br>'.mysql_error());
		}
		if(!$retval_del){
			die('could not enter data<br>'.mysql_error());	
		}
		else{
		echo "successfull.<br>";
		$text='<a href="authority_portal.php">Back to Portal</a>';
		echo $text;
		}
		mysql_close($conn);
	}
 ?>