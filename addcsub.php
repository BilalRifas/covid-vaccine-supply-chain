<?php session_start(); require_once('conn.php');
if(isset($_POST['search'])){
	
	
	$sql = "SELECT * FROM users where unm ='".$_POST['srh']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$unm = $row['unm'];
$pw = $row['pw'];

$sqll = "SELECT * FROM doctor where unm ='".$unm."'";
$results=mysql_query($sqll);
$row = mysql_fetch_assoc($results);
$fnm = $row['fnm'];
$lnm = $row['lnm'];
$desig = $row['desig'];
$specl = $row['specl'];


header("location:addc.php?sr=1&unm={$unm}&pw={$pw}&fnm={$fnm}&lnm={$lnm}&desig={$desig}&specl={$specl}");

}else if (isset($_POST['insert'])) {
	
	$sql = "SELECT * FROM users where unm ='".$_POST['unm']."'";
				$results=mysql_query($sql);
				$row = mysql_fetch_assoc($results);
				$unm = $row['unm'];
				
	if($_POST['unm'] == $unm){
	header("location:addc.php?#popup1");
	}else{
		
	$sql = "INSERT INTO users (unm, pw, utp)
VALUES ('".$_POST['unm']."', '".$_POST['pw']."', 'doc')";
$results=mysql_query($sql);

$sqll = "INSERT INTO doctor (unm, fnm, lnm, desig, specl)
VALUES ('".$_POST['unm']."', '".$_POST['fnm']."', '".$_POST['lnm']."', '".$_POST['desig']."', '".$_POST['specl']."')";
$results=mysql_query($sqll);


header("location:addc.php?#popup2");
		}
}

else if (isset($_POST['update'])) {
	
	$sqll = "UPDATE users SET pw='".$_POST['pw']."' WHERE unm ='".$_POST['unm']."'";
	$results=mysql_query($sqll);
	
	$sql = "UPDATE doctor SET fnm='".$_POST['fnm']."', lnm='".$_POST['lnm']."', desig='".$_POST['desig']."', specl='".$_POST['specl']."' WHERE unm ='".$_POST['unm']."'";
	$results=mysql_query($sql);

header("location:addc.php?#popup3");

}

else if (isset($_POST['delete'])) {
	
	
		$sql = "INSERT INTO terms (fnm, lnm, unm, lup)
				VALUES ('".$_POST['fnm']."', '".$_POST['lnm']."', '".$_POST['unm']."', '".$_SESSION['unm']."')";

		$results=mysql_query($sql);
			
			$sqlll = "DELETE FROM users WHERE unm='".$_POST['unm']."'";
		$results=mysql_query($sqlll);
		
		$sqll = "DELETE FROM doctor WHERE unm='".$_POST['unm']."'";
		$results=mysql_query($sqll);

header("location:addc.php?#popup4");

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

header("location:addc.php");

}
?>