<?php 

require('fpdf17/fpdf.php');
$pdf = new FPDF('P','mm',array(700,750));
$pdf->addPage("P", "A3");
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(25,7,"IP");
$pdf->Cell(30,7,"Username");
$pdf->Cell(40,7,"Location");
$pdf->Cell(30,7,"Intercom");
$pdf->Cell(30,7,"Division");
$pdf->Cell(30,7,"Designation");
$pdf->Cell(30,7,"Antivirus");
$pdf->Cell(30,7,"MAC");
$pdf->Cell(30,7,"Non NIC / Coordinator");
$pdf->Cell(30,7,"Connected / Switch");
$pdf->Cell(30,7,"Issue Date");
$pdf->Cell(40,7,"Reason for change");
$pdf->Cell(40,7,"Verify IP in NULL");
$pdf->Cell(30,7,"Old User details");
$pdf->Cell(30,7,"Issued By");
$pdf->Ln();
$pdf->Cell(800,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$pdf->Output();
session_start();
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

					// $pdf->Cell(25,7,$query_execute[0]);
		   //          $pdf->Cell(30,7,$query_execute[1]);
		   //          $pdf->Cell(40,7,$address);
		   //          $pdf->Cell(30,7,$class);
		   //          $pdf->Cell(30,7,$phone);
		   //          $pdf->Cell(30,7,$email); 
		   //          $pdf->Ln(); 
		}

	}
	else{
		echo "query not executed<br>";
	}

 ?>