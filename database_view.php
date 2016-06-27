<!DOCTYPE html>
<html>
<head>
	<title>nic </title>
	
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	
	<link rel="stylesheet" type="text/css" href="style/jquery.dataTables.min.css">
    <script src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript">
       $(document).ready(function() {
  		  $('#example').DataTable();
		} );
	</script>
</head>
<body>

<img src="img/nic.png" style="width:100%;">
<div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
</div>
<button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000;text-decoration:none;">Back</a></button>
<br><br>
<div class="search_options">
<div class="search">
 	<form method="post" action="show.php" action="submit" class="form">
 	<center class="form_center">
				 Username : 
				<input type="text" name='searchtext' id="searchtext" placeholder="Enter Username" />
				<button type="submit" name="search" id="search" />search</button>
				<br><br>
				Ip Address:
				<input type="text" name='searchtextip' id="searchtextip" placeholder="Enter IP" />
				<button type="submit" name="searchip" id="searchip" />search</button><br><br>
	</center>
	</form>
</div>
<div class="filter">
	<form method="post" action="database_view.php" class="form"> 
	<center class="form_center">
		<button type="submit" name="allocated">Allocated</button><br><br>
		<input type="text" name='search_seagment' id="search_seagment" placeholder="Enter Seagment" />
		<button type="submit" name="segement_all">All</button>
		<button type="submit" name="segment_allocated">Allocated</button><br><br>
		<br>
	</center>
	</form>	
</div>
</div>

<div class="export">
	<a href="ip_view.php"><button>Download as Excel Sheet</button></a>
</div><br>
	<?php 
	session_start();
	require 'connect.php';
	if(isset($_POST['allocated'])){
		$query="SELECT * FROM `nic_worker_info` WHERE username<>'Free IP Address' AND IP NOT LIKE 'AA%' AND isHistory=0";
	}
	else if(isset($_POST['segement_all'])){
		$ip_segment=$_POST['search_seagment'];
		$query="SELECT * FROM `nic_worker_info` WHERE IP LIKE '$ip_segment%' AND isHistory=0";
	}
	else if(isset($_POST['segment_allocated'])){
		$ip_segment=$_POST['search_seagment'];
		$query="SELECT * FROM `nic_worker_info` WHERE username<>'Free IP Address' AND IP LIKE '$ip_segment%'";
	}
	else $query="SELECT * FROM `nic_worker_info` WHERE isHistory=0";
	?>
	
	
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
					<tr>
						<th>IP</th>
						<th>Username</th>
						<th>Location</th>
						<th>Intercom</th>
						<th>Division</th>
						<th>Designation</th>
						<th>Antivirus</th>
						<th>MAC</th>
						<th>Non NIC /<br/>Coordinator</th>
						<th>Connected /<br/>Switch</th>
						<th>Connected <br/>Port</th>
						<th>Issue Date</th>
						<th>Reason for<br/>change IP</th>
						<th>Verify<br/>Ip in NULL</th>
						<th>Old user<br/>detail</th>
						<th>Issued By</th>
					</tr>
				</thead>
				<tbody>
           
		<?php
		$_SESSION['query']=$query;

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
							<td><?php echo $query_execute['connected port'] ?></td>
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
				
 <br>
</body>
</html>