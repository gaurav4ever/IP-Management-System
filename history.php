<?php 

	if(isset($_POST['add'])){
		session_start();
		require 'connect.php';
		$ip_update=$_SESSION['ip'];
		$text_update=$_SESSION['text'];
		$marray=array();
		if(!get_magic_quotes_gpc() )
			{
			    $ip=addslashes($_POST['ip']);array_push($marray, $ip);
				$username=strtoupper(addslashes($_POST['username']));array_push($marray, $username);
				$location=strtoupper(addslashes($_POST['location']));array_push($marray, $location);
				$intercom=strtoupper(addslashes($_POST['intercom']));array_push($marray, $intercom);
				$division=strtoupper(addslashes($_POST['division']));array_push($marray, $division);
				$designation=strtoupper(addslashes($_POST['designation']));array_push($marray, $designation);
				$antiVirus=strtoupper(addslashes($_POST['antiVirus']));array_push($marray, $antiVirus);
				$mac=addslashes($_POST['mac']);array_push($marray, $mac);
				$nonNiC=strtoupper(addslashes($_POST['nonNic']));array_push($marray, $nonNiC);
				$connectSwitch=strtoupper(addslashes($_POST['connectedSwitch']));array_push($marray, $connectSwitch);
				$issueDate=strtoupper(addslashes($_POST['issueDate']));array_push($marray, $issueDate);
				$reasonForChangeIp=strtoupper(addslashes($_POST['changeIp']));array_push($marray, $reasonForChangeIp);
				$verifyIp=strtoupper(addslashes($_POST['verifyIp']));array_push($marray, $verifyIp);
				$oldUserDetail=strtoupper(addslashes($_POST['oldUserDetails']));array_push($marray, $oldUserDetail);
				$issuedby=strtoupper(addslashes($_POST['issuedBy']));array_push($marray, $issuedby);

			}
			else{
				$ip=$_POST['ip'];array_push($marray, $ip);
				$username=strtoupper($_POST['username']);array_push($marray, $username);
				$location=strtoupper($_POST['location']);array_push($marray, $location);
				$intercom=strtoupper($_POST['intercom']);array_push($marray, $intercom);
				$division=strtoupper($_POST['division']);array_push($marray, $division);
				$designation=strtoupper($_POST['designation']);array_push($marray, $designation);
				$antiVirus=strtoupper($_POST['antiVirus']);array_push($marray, $antiVirus);
				$nonNiC=strtoupper($_POST['nonNic']);array_push($marray, $mac);
				$mac=$_POST['mac'];array_push($marray, $nonNic);
				$issueDate=strtoupper($_POST['issueDate']);array_push($marray, $connectedSwitch);
				$connectSwitch=strtoupper($_POST['connectedSwitch']);array_push($marray, $issueDate);
				$reasonForChangeIp=strtoupper($_POST['changeIp']);array_push($marray, $reasonForChangeIp);
				$verifyIp=strtoupper($_POST['verifyIp']);array_push($marray, $verfiyIp);
				$oldUserDetail=strtoupper($_POST['oldUserDetails']);array_push($marray, $oldUserDetails);
				$issuedby=strtoupper($_POST['issuedBy']);array_push($marray, $issuedby);
			}

			//print_r($marray);

			//current date and time
			date_default_timezone_set("Asia/Kolkata");
			$action_date=date("Y-m-d h:i:sa");
			
			mysql_select_db('nic database');

			//general sql query for checking IP whether is used or free currently
			$sql_general="SELECT * FROM `nic_worker_info` ";

			//if user searches by IP
			if($text_update==""){

				//common for all cases
				$sql_ip="SELECT * FROM `nic_worker_info` WHERE IP='$ip_update' AND isHistory=0";
				$retval_ip=mysql_query($sql_ip);
				if(!$retval_ip)die("Server error");
				$mquery_ip=mysql_fetch_array($retval_ip);

				$user=$mquery_ip['user']; //user name who applied the IP request
				$user_division=$mquery_ip['division']; //division which was applied by the user

				//if user changed other fields but leaves IP field of division	
				if($ip_update==$ip){

					//update the filed with isHistory=1
					$sql_old="UPDATE `nic_worker_info` SET `isHistory`=1 , `actionHappened`='updated' , `actionDate`='$action_date' WHERE IP='$ip_update' AND isHistory=0";
					$retval_old=mysql_query($sql_old);
					if(!$retval_old)die("Server error");

					//create a new row including all the change values
					$sql_new="INSERT INTO `nic_worker_info`(`IP`, `username`, `location`, `intercom`, `division`, `designation`, `antivirus`, `MAC`, `Non NIC/ Coordinator`, `connected/ switch`, `issue date`, `reason for change Ip`, `verify Ip in NULL`, `Old user detail`, `Issued By`, `user`) VALUES ('$ip','$username','$location','$intercom','$division','$designation','$antiVirus','$mac','$nonNiC','$connectSwitch','$issueDate','$reasonForChangeIp','$verifyIp','$oldUserDetail','$issuedby','$user')";
					$retval_new=mysql_query($sql_new);
					if(!$retval_new)die("Server error");

				}
				else{ //if details are changed along with IP and division
						
					//update the main row with isHistory=1
					$sql_old="UPDATE `nic_worker_info` SET `isHistory`=1 , `actionHappened`='updated' , `actionDate`='$action_date' WHERE IP='$ip_update' AND isHistory=0";
					$retval_old=mysql_query($sql_old);
					if(!$retval_old)die("Server error");

					//create a new row with IP address and username as Free Ip Address
					$sql_new_free_ip="INSERT INTO `nic_worker_info`(`IP`,`username`,`division`) VALUES ('$ip_update','Free IP Address','$user_division')";
					$retval_new_free_ip=mysql_query($sql_new_free_ip);
					if(!$retval_new_free_ip)die("Server error");


					//create a new row with new values of previous row
					$sql_new="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='$username',`location`='$location',`intercom`='$intercom',`division`='$division',`designation`='$designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verifyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby',`user`='$user' WHERE IP='$ip'";
					$retval_new=mysql_query($sql_new);
					if(!$retval_new)die("Server error");

				}
			}
			else{ //if user searches by name

				//common for all cases
				$sql_text="SELECT * FROM `nic_worker_info` WHERE username='$text_update' AND isHistory=0";
				$retval_text=mysql_query($sql_text);
				if(!$retval_text)die("Server error");
				$mquery_text=mysql_fetch_array($retval_text);
				print_r($mquery_text);

				$user=$mquery_text['user'];
				$ip_text=$mquery_text['IP'];
				$user_division=$mquery_text['division'];

				//2 cases

				//if details are changed leaving the ip and division
				if($mquery_text['IP']==$ip){

					//update the field with isHistory=1 
					$sql_old="UPDATE `nic_worker_info` SET `isHistory`=1 , `actionHappened`='updated' , `actionDate`='$action_date' WHERE username='$text_update' AND isHistory=0";
					$retval_old=mysql_query($sql_old);
					if(!$retval_old)die("Server error");

					//create a new row with new values of previous row
					$sql_new="INSERT INTO `nic_worker_info` (`IP`, `username`, `location`, `intercom`, `division`, `designation`, `antivirus`, `MAC`, `Non NIC/ Coordinator`, `connected/ switch`, `issue date`, `reason for change Ip`, `verify Ip in NULL`, `Old user detail`, `Issued By`,`user`) VALUES ('$ip','$username','$location','$intercom','$division','$designation','$antiVirus','$mac','$nonNiC','$connectSwitch','$issueDate','$reasonForChangeIp','$verifyIp','$oldUserDetail','$issuedby','$user')";
					$retval_new=mysql_query($sql_new);
					if(!$retval_new)die("hello Server error".mysql_error());

				}
				else{	//if details are changed along with IP and division

					//update the main row with isHistory=1
					$sql_old="UPDATE `nic_worker_info` SET `isHistory`=1 , `actionHappened`='updated' , `actionDate`='$action_date' WHERE IP='$ip_text' AND isHistory=0";
					$retval_old=mysql_query($sql_old);
					if(!$retval_old)die("Server error");

					//create a new row with IP address and username as Free Ip Address
					$sql_new_free_ip="INSERT INTO `nic_worker_info`(`IP`,`username`,`division`,`isHistory`) VALUES ('$ip_text','Free IP Address','$user_division',0)";
					$retval_new_free_ip=mysql_query($sql_new_free_ip);
					if(!$retval_new_free_ip)die("Server error");

					$sql_new="UPDATE `nic_worker_info` SET `IP`='$ip',`username`='$username',`location`='$location',`intercom`='$intercom',`division`='$division',`designation`='$designation',`antivirus`='$antiVirus',`MAC`='$mac',`Non NIC/ Coordinator`='$nonNiC',`connected/ switch`='$connectSwitch',`issue date`='$issueDate',`reason for change Ip`='$reasonForChangeIp',`verify Ip in NULL`='$verifyIp',`Old user detail`='$oldUserDetail',`Issued By`='$issuedby',`user`='$user' WHERE IP='$ip'";

					$retval_new=mysql_query($sql_new);
					if(!$retval_new)die("Server error");
				}
			}
			echo "Update Successfull...";
			?>
			<meta http-equiv="refresh" content="1;url=updateIP.php" />
			<?php
		}
 ?>