<!DOCTYPE html>
<html>
<head>
	<title>Show Details</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

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
<img src="img/nic.png" style="width:100%">
<div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
	<BUTTON>
		<a href="database_view.php">Go Back</a></BUTTON>
</div>

<?php 
		
		if(isset($_POST['search']) || isset($_POST['searchip'])){

			require 'connect.php';
			$text=$_POST['searchtext'];
			$ip=$_POST['searchtextip'];
			//echo $ip;

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
			//print_r($mquery2);

			//user_info database table
			$user=$mquery2['user'];
			$sql_user="SELECT * FROM `user_info` WHERE username='$user'";
			$retval_user=mysql_query($sql_user);
			$mquery_user=mysql_fetch_array($retval_user);
			//finished
			echo "<br><br>";
			if($text=="" && $ip=="")die("Both field are empty...");
			elseif($text=="")echo "Username field empty...<br> ";
			elseif($ip=="")echo "IP field empty...<br> ";
			if($text==$mquery2['username'] || $ip==""){

				?>
				<table id="example" class="display" cellspacing="0" width="150%">
			<thead>
					<tr>
						<th>History</th>
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
						<th>Issue Date</th>
						<th>Reason for<br/>change IP</th>
						<th>Verify<br/>Ip in NULL</th>
						<th>Old user<br/>detail</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while($mquery1=mysql_fetch_array($retval1)){
				
					if($mquery1['isHistory']==1){
						?>
						<tr>
							<td><?php echo $mquery1['actionHappened'].' on '.$mquery1['actionDate'] ?></td>
							<td><?php echo $mquery1['IP'] ?></td>
							<td><?php echo $mquery1['username'] ?></td>
							<td><?php echo $mquery1['location'] ?></td>
							<td><?php echo $mquery1['intercom'] ?></td>
							<td><?php echo $mquery1['division'] ?></td>
							<td><?php echo $mquery1['designation'] ?></td>
							<td><?php echo $mquery1['antivirus'] ?></td>
							<td><?php echo $mquery1['MAC'] ?></td>
							<td><?php echo $mquery1['Non NIC/ Coordinator'] ?></td>
							<td><?php echo $mquery1['connected/ switch'] ?></td>
							<td><?php echo $mquery1['issue date'] ?></td>
							<td><?php echo $mquery1['reason for change Ip'] ?></td>
							<td><?php echo $mquery1['verify Ip in NULL'] ?></td>
							<td><?php echo $mquery1['Old user detail'] ?></td>
							<td><?php echo $mquery1['Issued By'] ?></td>
						</tr>
						<?php
					}
					else{
						?>
							<tr>
							<td><?php echo "Latest" ?></td>
							<td><?php echo $mquery1['IP'] ?></td>
							<td><?php echo $mquery1['username'] ?></td>
							<td><?php echo $mquery1['location'] ?></td>
							<td><?php echo $mquery1['intercom'] ?></td>
							<td><?php echo $mquery1['division'] ?></td>
							<td><?php echo $mquery1['designation'] ?></td>
							<td><?php echo $mquery1['antivirus'] ?></td>
							<td><?php echo $mquery1['MAC'] ?></td>
							<td><?php echo $mquery1['Non NIC/ Coordinator'] ?></td>
							<td><?php echo $mquery1['connected/ switch'] ?></td>
							<td><?php echo $mquery1['issue date'] ?></td>
							<td><?php echo $mquery1['reason for change Ip'] ?></td>
							<td><?php echo $mquery1['verify Ip in NULL'] ?></td>
							<td><?php echo $mquery1['Old user detail'] ?></td>
							<td><?php echo $mquery1['Issued By'] ?></td>
						</tr>
						<?php
					}
			}
			echo '<br>';
			}
			else{
				?>
				<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>History</th>
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
						<th>Issue Date</th>
						<th>Reason for<br/>change IP</th>
						<th>Verify<br/>Ip in NULL</th>
						<th>Old user<br/>detail</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql2_new="SELECT * FROM `nic_worker_info` WHERE ip='$ip'";
				$retval2_new=mysql_query($sql2_new);
				if(!$retval2_new)die("Server Error");

				while($mquery2_new=mysql_fetch_array($retval2_new)){
					if($mquery2_new['isHistory']==1){
						?>
						<tr>
							<td><?php echo $mquery2_new['actionHappened'].' on '.$mquery2_new['actionDate']; ?></td>
							<td><?php echo $mquery2_new['IP'] ?></td>
							<td><?php echo $mquery2_new['username'] ?></td>
							<td><?php echo $mquery2_new['location'] ?></td>
							<td><?php echo $mquery2_new['intercom'] ?></td>
							<td><?php echo $mquery2_new['division'] ?></td>
							<td><?php echo $mquery2_new['designation'] ?></td>
							<td><?php echo $mquery2_new['antivirus'] ?></td>
							<td><?php echo $mquery2_new['MAC'] ?></td>
							<td><?php echo $mquery2_new['Non NIC/ Coordinator'] ?></td>
							<td><?php echo $mquery2_new['connected/ switch'] ?></td>
							<td><?php echo $mquery2_new['issue date'] ?></td>
							<td><?php echo $mquery2_new['reason for change Ip'] ?></td>
							<td><?php echo $mquery2_new['verify Ip in NULL'] ?></td>
							<td><?php echo $mquery2_new['Old user detail'] ?></td>
							<td><?php echo $mquery2_new['Issued By'] ?></td>
						</tr>

						<?php
					}
					else{
						?>
						<tr>
							<td><?php echo "Latest" ?></td>
							<td><?php echo $mquery2_new['IP'] ?></td>
							<td><?php echo $mquery2_new['username'] ?></td>
							<td><?php echo $mquery2_new['location'] ?></td>
							<td><?php echo $mquery2_new['intercom'] ?></td>
							<td><?php echo $mquery2_new['division'] ?></td>
							<td><?php echo $mquery2_new['designation'] ?></td>
							<td><?php echo $mquery2_new['antivirus'] ?></td>
							<td><?php echo $mquery2_new['MAC'] ?></td>
							<td><?php echo $mquery2_new['Non NIC/ Coordinator'] ?></td>
							<td><?php echo $mquery2_new['connected/ switch'] ?></td>
							<td><?php echo $mquery2_new['issue date'] ?></td>
							<td><?php echo $mquery2_new['reason for change Ip'] ?></td>
							<td><?php echo $mquery2_new['verify Ip in NULL'] ?></td>
							<td><?php echo $mquery2_new['Old user detail'] ?></td>
							<td><?php echo $mquery2_new['Issued By'] ?></td>
						</tr>
						<?php
					}

				}
				?>
				</tbody>
				</table>
				<?php
		}
	}
	}
 ?><br>


</body>
</html>