<?php 

ini_set('SMTP','ssl:smtp.gmail.com');
ini_set('smtp_port','25');
ini_set("username","gauravsharma.mvp@gmail.com"); 
ini_set("password","gaurav0635");

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


$from="gauravsharma.mvp@gmail.com";
$to = "gauravrocks.sharma49@gmail.com";
$subject = "My subject";
$txt = "Yo bro!";

// $headers = "From: gauravsharma.mvp@gmail.com" . "\r\n" .
// "CC: gauravsharma2014@vit.ac.in";

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ". $from. "\r\n";
$headers .= "Reply-To: ". $to. "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "X-Priority: 1" . "\r\n"; 



if(mail($to,$subject,$txt,$headers))
	echo "successfull";
else echo "unsccessfull";


 ?>