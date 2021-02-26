<?php session_start(); require_once('conn.php');
if(isset($_POST['search'])){
	
	
	$sql = "SELECT * FROM users where unm ='".$_POST['srh']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$unm = $row['unm'];
$pw = $row['pw'];

$sqll = "SELECT * FROM hospitals where unm ='".$unm."'";
$results=mysql_query($sqll);
$row = mysql_fetch_assoc($results);
$hnm = $row['hnm'];


header("location:adhsp.php?sr=1&unm={$unm}&pw={$pw}&hnm={$hnm}");

}else if (isset($_POST['insert'])) {
	
	$sql = "SELECT * FROM users where unm ='".$_POST['unm']."'";
				$results=mysql_query($sql);
				$row = mysql_fetch_assoc($results);
				$unm = $row['unm'];
				
	if($_POST['unm'] == $unm){
	header("location:adhsp.php?#popup1");
	}else{
		
	$sql = "INSERT INTO users (unm, pw, utp)
VALUES ('".$_POST['unm']."', '".$_POST['pw']."', 'hmanage')";
$results=mysql_query($sql);

$sqll = "INSERT INTO hospitals (unm, hnm, dstric, wrds, thetrs, icub, bds, cont, ambcnt, eml, tpe)
VALUES ('".$_POST['unm']."', '".$_POST['hnm']."', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
$results=mysql_query($sqll);


header("location:adhsp.php?#popup2");
		}
}

else if (isset($_POST['update'])) {
	
	$sqll = "UPDATE users SET pw='".$_POST['pw']."' WHERE unm ='".$_POST['unm']."'";
	$results=mysql_query($sqll);
	
	$sql = "UPDATE hospitals SET hnm='".$_POST['hnm']."' WHERE unm ='".$_POST['unm']."'";
	$results=mysql_query($sql);

header("location:adhsp.php?#popup3");

}

else if (isset($_POST['delete'])) {
	
	
		$sql = "INSERT INTO terms (fnm, lnm, unm, lup)
				VALUES ('".$_POST['hnm']."', 'hospital', '".$_POST['unm']."', '".$_SESSION['unm']."')";

		$results=mysql_query($sql);
			
			$sqlll = "DELETE FROM users WHERE unm='".$_POST['unm']."'";
		$results=mysql_query($sqlll);
		
		$sqll = "DELETE FROM hospitals WHERE unm='".$_POST['unm']."'";
		$results=mysql_query($sqll);

header("location:adhsp.php?#popup4");

}

else if (isset($_POST['clear'])) {
	
		?><script>
			function Clear()
{    
   document.getElementById("textbox1").value= "";
   document.getElementById("textbox2").value= "";
   document.getElementById("textbox3").value= "";
}
			</script><?php

header("location:adhsp.php");

}
?>