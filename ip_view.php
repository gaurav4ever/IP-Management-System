<!DOCTYPE html>
<html>
<head>
	<title>IP_view</title>
	<style type="text/css">
		table{
			width: 170%;
		}
		td{
			font-size: 15px;
			width: 130px;
			border: 1px solid #d1d1d1;
		}
		.names td{
			color: #3333ff;
			font-size: 18px;
		}
		</style>
</head>
<body>
	<?php 
session_start();
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=report.xls");

require 'connect.php';
	$query=$_SESSION['query'];
	if($is_query_run=mysql_query($query)){
		$text1='<table>
					<tr class="names">
						<td style="">IP</td>
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
						<td>Issued By</td>
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
							<td>'.$query_execute['Issued By'].'</td>
						</tr>
					</table>';
			echo "$text";
					
		}

	}
	else{
		echo "query not executed<br>";
	}
 ?>
</body>
</html>
