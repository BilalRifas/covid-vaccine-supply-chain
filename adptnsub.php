<?php session_start(); require_once('conn.php');
if(isset($_POST['search'])){
	
	
	$sql = "SELECT * FROM patient where nic ='".$_POST['srh']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$nic = $row['nic'];
$fnm = $row['fnm'];
$lnm = $row['lnm'];
$adrs = $row['adrs'];
$phn = $row['phn'];
$eml = $row['eml'];


header("location:adptn.php?sr=1&nic={$nic}&fnm={$fnm}&lnm={$lnm}&adrs={$adrs}&phn={$phn}&eml={$eml}");

}else if (isset($_POST['insert'])) {
	
	$sql = "SELECT * FROM patient where nic ='".$_POST['nic']."'";
				$results=mysql_query($sql);
				$row = mysql_fetch_assoc($results);
				$nic = $row['nic'];
				
	if($_POST['nic'] == $nic){
	header("location:adptn.php?#popup1");
	}else{
		
	$sql = "INSERT INTO patient (nic, fnm, lnm, adrs, phn, eml, doc)
VALUES ('".$_POST['nic']."', '".$_POST['fnm']."', '".$_POST['lnm']."', '".$_POST['adrs']."', '".$_POST['phn']."', '".$_POST['eml']."', '".$_SESSION['unm']."')";
$results=mysql_query($sql);

header("location:adptn.php?#popup2");
		}
}

else if (isset($_POST['update'])) {
	
	$sql = "UPDATE patient SET fnm='".$_POST['fnm']."', lnm='".$_POST['lnm']."', adrs='".$_POST['adrs']."', phn='".$_POST['phn']."', eml='".$_POST['eml']."', doc='".$_SESSION['unm']."' WHERE nic ='".$_POST['nic']."'";
	$results=mysql_query($sql);

header("location:adptn.php?#popup3");

}

else if (isset($_POST['clear'])) {
	
		?><script>
			function Clear()
{    
   document.getElementById("textbox1").value= "";
   document.getElementById("textbox2").value= "";
   document.getElementById("textbox3").value= "";
   document.getElementById("textbox4").value= "";
   document.getElementById("textbox5").value= "";
   document.getElementById("textbox6").value= "";
}
			</script><?php

header("location:adptn.php");

}
?>