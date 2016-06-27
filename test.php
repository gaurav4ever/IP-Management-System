<?php 
$a=0;

if(1){
	global $a;
	echo $a;
	$a=1;
	echo $a;
}
echo '=after if : '.$a;

 ?>