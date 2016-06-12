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
				echo "hello<br>";
			    $ip=addslashes($_POST['ip']);
				$username=addslashes($_POST['username']);
				$location=addslashes($_POST['location']);
				$intercom=addslashes($_POST['intercom']);
				$division=addslashes($_POST['division']);
				$designation=addslashes($_POST['designation']);
				$antiVirus=addslashes($_POST['antiVirus']);
				$mac=addslashes($_POST['mac']);
				$nonNiC=addslashes($_POST['nonNic']);
				$connectSwitch=addslashes($_POST['connectedSwitch']);
				$issueDate=addslashes($_POST['issueDate']);
				$reasonForChangeIp=addslashes($_POST['changeIp']);
				$verfiyIp=addslashes($_POST['verifyIp']);
				$oldUserDetail=addslashes($_POST['oldUserDetails']);
			}
			else{
				$ip=$_POST['ip'];
				$username=$_POST['username'];
				$location=$_POST['location'];
				$intercom=$_POST['intercom'];
				$division=$_POST['division'];
				$designation=$_POST['designation'];
				$antiVirus=$_POST['antiVirus'];
				$nonNiC=$_POST['nonNic'];
				$mac=$_POST['mac'];
				$issueDate=$_POST['issueDate'];
				$connectSwitch=$_POST['connectedSwitch'];
				$reasonForChangeIp=$_POST['changeIp'];
				$verfiyIP=$_POST['verfiyIp'];
				$oldUserDetail=$_POST['oldUserDetails'];
			}

			$sql="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='$username',`location`='$location',`intercom`='$intercom',`division`='$division',`designation`='designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verfiyIp',`Old user detail`='$oldUserDetail' WHERE IP='$ip'";
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
		echo "Data Entered successfully<br>";
		$text='<a href="authority_portal.html">Back to Portal</a>';
		echo $text;
		}
		mysql_close($conn);
	}
 ?>