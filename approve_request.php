<?php 

	if(isset($_POST['add'])){
		require 'connect.php';
		mysql_select_db("nic database");
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

			$sql_user="SELECT * FROM `nic_worker_info` WHERE flag=1";
			$retval_user=mysql_query($sql_user);
			if(!$retval_user)die("Server error");
			$mquery_user=mysql_fetch_array($retval_user);
			$current_ip_user=$mquery_user['user'];

			$sql="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='$username',`location`='$location',`intercom`='$intercom',`division`='$division',`designation`='$designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`connected port`='$connectPort',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verfiyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby',`user`='$current_ip_user' WHERE IP='$ip'";

			$sql_del="DELETE FROM `nic_worker_info` WHERE flag=1";

			
			
		$retval=mysql_query($sql);
		$retval_del=mysql_query($sql_del);
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
	}
 ?>