<?php session_start(); require_once('conn.php');

require_once('tcpdf/examples/tcpdf_include.php');
require_once('tcpdf/tcpdf.php');

if(isset($_POST['search'])){

$sqll = "SELECT * FROM logbook WHERE nic = '".$_POST['nic']."'";
   $malith = mysql_query($sqll);
   
   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

   // set font
   $pdf->SetFont('times', '', 10);

   // add a page
   $pdf->AddPage();



   $html = '<h2 align="center">PATIENT DETAILS REPORT</h2>
    <table align="center" border="1">
    <tr>
        <th>NIC</th>
        <th>PATIENT_NAME</th>
        <th>DATE</th>
		 <th>REASON</th>
		 <th>COMMENT</th>
		 <th>DOCTOR</th>
    </tr>';

while($data=mysql_fetch_array($malith)) { 

$dfnm = $data['fnm'];
$dlnm = $data['lnm'];
$nme = $dfnm . ' ' . $dlnm;

if($data['stts'] == 'Important'){

    $html .= '<tr style="background-color:red">
	<td>'.$data['nic'].'</td>
	<td>'.$nme.'</td>
	<td>'.$data['dt'].'</td>
	<td>'.$data['rsn'].'</td>
	<td>'.$data['cm'].'</td>
	<td>'.$data['doc'].'</td>
	</tr>';
	
}else{
	
	$html .= '<tr>
	<td>'.$data['nic'].'</td>
	<td>'.$nme.'</td>
	<td>'.$data['dt'].'</td>
	<td>'.$data['rsn'].'</td>
	<td>'.$data['cm'].'</td>
	<td>'.$data['doc'].'</td>
	</tr>';
	
}
}
$html .= '</table>';


  $pdf->writeHTML($html, true, false, true, false, '');


   $pdf->Output('Patient Report.pdf','D');
   
}