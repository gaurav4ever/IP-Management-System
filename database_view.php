<!DOCTYPE html>
<html>
<head>
	<title>nic </title>
	<style type="text/css">
		table{
			width: 130%;
		}
		td{
			width: 100px;
			border: 1px solid #000000;
		}
		.names td{
			color: #3333ff;
			font-size: 18px;
		}
	</style>
</head>
<body>

<img src="img/nic.png" style="width:100%;margin-bottom:40px;"><br/>
<center>
 	<form method="post" action="show.php" action="submit">
				 Username : 
				<input type="text" name='searchtext' id="searchtext" placeholder="Enter Username" />
				<input type="submit" name="search" id="search" value="search"/>
				<br><br>
				Ip Address:
				<input type="text" name='searchtextip' id="searchtextip" placeholder="Enter IP" />
				<input type="submit" name="searchip" id="searchip" value="search"/><br><br>
				</form>
	</center>
	<?php 

	require 'connect.php';
	$query="SELECT * FROM `nic_worker_info`";
	if($is_query_run=mysql_query($query)){

		$text1='<table>
					<tr class="names">
						<td>IP</td>
						<td>Username</td>
						<td>Location</td>
						<td>Intercom</td>
						<td>Division</td>
						<td>Designation</td>
						<td>Antivirus</td>
						<td>MAC</td>
						<td>Non NIC /<br/>Coordinator</td>
						<td>Connected /<br/>Switch</td>
						<td>Issue Date</td>
						<td>Reason for<br/>change IP</td>
						<td>Verify<br/>Ip in NULL</td>
						<td>Old user<br/>detail</td>
					</tr>
				</table>';
			echo "$text1";
		while($query_execute=mysql_fetch_assoc($is_query_run)){
			//echo 'name: '.$query_execute['Name'].'<br>';
			$text='<table>
						<tr>
							<td>'.$query_execute['IP'].'</td>
							<td>'.$query_execute['username'].'</td>
							<td>'.$query_execute['location'].'</td>
							<td>'.$query_execute['intercom'].'</td>
							<td>'.$query_execute['division'].'</td>
							<td>'.$query_execute['designation'].'</td>
							<td>'.$query_execute['antivirus'].'</td>
							<td>'.$query_execute['MAC'].'</td>
							<td>'.$query_execute['Non NIC/ Coordinator'].'</td>
							<td>'.$query_execute['connected/ switch'].'</td>
							<td>'.$query_execute['issue date'].'</td>
							<td>'.$query_execute['reason for change Ip'].'</td>
							<td>'.$query_execute['verify Ip in NULL'].'</td>
							<td>'.$query_execute['Old user detail'].'</td>
						</tr>
					</table>';
			echo "$text";
		}
	}
	else{
		echo "query not executed<br>";
	}

 ?>
 <br>
</body>
</html>