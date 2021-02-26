<?php session_start(); require_once('conn.php');
if(isset($_POST['search'])){
	
	
	$sql = "SELECT * FROM patient where nic ='".$_POST['srh']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$fnm = $row['fnm'];
$lnm = $row['lnm'];
$nic = $row['nic'];


header("location:upptn.php?sr=1&fnm={$fnm}&lnm={$lnm}&nic={$nic}");

}else if (isset($_POST['insert'])) {
	
	$sql = "SELECT * FROM doctor where unm ='".$_SESSION['unm']."'";
				$results=mysql_query($sql);
				$row = mysql_fetch_assoc($results);
				$dfnm = $row['fnm'];
				$dlnm = $row['lnm'];
				$nme = $dfnm . ' ' . $dlnm;
		
	$sql = "INSERT INTO logbook (nic, fnm, lnm, dt, rsn, stts, cm, doc)
VALUES ('".$_POST['nic']."', '".$_POST['fnm']."', '".$_POST['lnm']."', '".$_POST['dt']."', '".$_POST['rsn']."', '".$_POST['stts']."', '".$_POST['cm']."', '".$nme."')";
$results=mysql_query($sql);

header("location:upptn.php?#popup1");
		}




?>