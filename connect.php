<?php 

	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_password='';

	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password)){
		die("Server error");
	}

 ?>