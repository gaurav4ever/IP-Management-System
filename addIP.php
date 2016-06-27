 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add IP</title>
 	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
 	<style type="text/css">
 		#box{
 			width: 200px;
 			height: 30px;
 		}
 		#button{
 			width: 150px;
 			height: 30px;
 		}
 	</style>
 </head>
 <body>
 <img src="img/nic.png" style="width:100%">
 <div class="banner">
		<center>
			<a href="logout_authority.php"><p>Logout</p></a>
		</center>
	</div>
 <button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000;text-decoration:none;">Back</a></button>
 <?php 

if(isset($_POST['submit'])){

	require 'connect.php';
	$p=$_POST['from'];
	$q=$_POST['to'];
	$min=min($p,$q);
	$max=max($p,$q);
	$flag1=0;
function ip_range($x,$y){

	$final_ip=array();
	//first time loop for x
		array_push($final_ip, $x);

 		$ip_start=split('[.]',$x);
 		$ip_end=split('[.]',$y);
 		$a=array();
 		$b=array();
 		$c=array();
 		$d=array();
 		for ($i=0; $i<4; $i++) { 
 			$a[$i]=(int)$ip_start[$i];
 			$b[$i]=(int)$ip_end[$i];
 		}
 		$a[3]=$a[3]-1;
 		// echo "a is:";
 		// print_r($a);
 		// print_r($b);
 		while ($a!=$b) {
 			$a[3]=$a[3]+1;
 			for ($i=3; $i>=1 ; $i=$i-1) { 
 				if ($a[$i]==256) {
 					$a[$i]=0;
 					$a[$i-1]+=1;
 				}

 			}
 				for ($i=0; $i<4; $i++) { 
 					$c[$i]=(string)$a[$i];
 					$d[$i]=(string)$b[$i];
 				}
 			$final_ip=join('.',$c);
 			echo $final_ip.'<br>';
 			$div=$_POST['division'];

 			//check whether the IP is already exist
 			$sql_all="SELECT * FROM `nic_worker_info` WHERE username='Free IP Address' AND isHistory=0";
 			$retval_all=mysql_query($sql_all);
 			if(!$retval_all)die("Server error");

 			$flag=0;

 			while($mquery_all=mysql_fetch_array($retval_all)){
 				if($final_ip==$mquery_all['IP']){
 					global $flag;
 					$flag=1;break;
 				}
 			}

 			if($flag==0){
 			$sql="INSERT INTO `nic_worker_info`(`flag`, `IP`, `username`, `location`, `intercom`, `division`, `designation`, `antivirus`, `MAC`, `Non NIC/ Coordinator`, `connected/ switch`,`connected port`, `issue date`, `reason for change Ip`, `verify Ip in NULL`, `Old user detail`) VALUES (0,'$final_ip','Free IP Address',' ',' ','$div',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ')";
 			$retval=mysql_query($sql);
 			if(!$retval){
 				die('could not insert data<br>'.mysql_error());
 			}
 			else{
 			}
 		}
 			

 		}
 		$text='<br>IP added successfully.<br>';
 					echo $text;

 	}


 	ip_range($min,$max);
}
 ?>
 <div class="container">
 <br><br>
 <center>
 	<form action="addIP.php" method="post">
 		<input type="text" id="box" name="from" placeholder="From"><br><br>
 		<input type="text" id="box" name="to" placeholder="To"><br><br>

 		<select name="division" id="box">
			<option disabled>select division</option>
			<option name=" INOC">INOC</option>
			<option name="lib">Library</option>
			<option name="ssk">SSK</option>
		</select><br><br>

 		<input type="submit" id="button" name="submit">
 		<p id="display">
 			
 		</p>
 	</form>
 	</center>
 </div>
 </body>
 </html>