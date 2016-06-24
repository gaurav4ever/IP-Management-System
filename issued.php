	<!DOCTYPE html>
	<html>
	<head>
		<title>Issued</title>
		<link rel="stylesheet" type="text/css" href="style/style_portal.css">
		
		<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
    <script src="jquery-1.12.3.js"></script>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
 	<script type="text/javascript">
       $(document).ready(function() {
  		  $('#example').DataTable();
		} );
	</script>
	</head>
	<body>
	<img src="img/nic.png" style="width:100%">
	<div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
	</div><br>
	<button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000; text-decoration:none;">Back</a></button><br><br>
	<div class="export">
	<a href="print_ip_issued.php"><button>Download as Excel Sheet</button></a>
</div><br>
	<?php 
	session_start();
	$auth_name=$_SESSION['username'];
	require 'connect.php';
	$query="SELECT * FROM `nic_worker_info` WHERE `Issued By` ='$auth_name'" ;
	?>
	
		
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
					<tr>
						<th>IP</th>
						<th>Username</td>
						<th>Location</th>
						<th>Intercom</th>
						<th>Division</th>
						<th>Designation</th>
						<th>Antivirus</th>
						<th>MAC</th>
						<th>Non NIC /<br/>Coordinator</th>
						<th>Connected /<br/>Switch</th>
						<th>Issue Date</th>
						<th>Reason for<br/>change IP</th>
						<th>Verify<br/>Ip in NULL</th>
						<th>Old user<br/>detail</th>
						<th>Issued By</th>
					</tr>
				</tread>
				<tbody>
			<?php
			$is_query_run=mysql_query($query);
		while($query_execute=mysql_fetch_assoc($is_query_run)){
			?>
	
						<tr>
							<td><?php echo $query_execute['IP'] ?></td>
							<td><?php echo $query_execute['username'] ?></td>
							<td><?php echo $query_execute['location'] ?></td>
							<td><?php echo $query_execute['intercom'] ?></td>
							<td><?php echo $query_execute['division'] ?></td>
							<td><?php echo $query_execute['designation'] ?></td>
							<td><?php echo $query_execute['antivirus'] ?></td>
							<td><?php echo $query_execute['MAC'] ?></td>
							<td><?php echo $query_execute['Non NIC/ Coordinator'] ?></td>
							<td><?php echo $query_execute['connected/ switch'] ?></td>
							<td><?php echo $query_execute['issue date'] ?></td>
							<td><?php echo $query_execute['reason for change Ip'] ?></td>
							<td><?php echo $query_execute['verify Ip in NULL'] ?></td>
							<td><?php echo $query_execute['Old user detail'] ?></td>
							<td><?php echo $query_execute['Issued By'] ?></td>
						</tr>
						<?php	
		}
		?>
		</tbody>
					</table>
	</body>
	</html>
	