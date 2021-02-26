<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
?>

<?php require_once('conn.php');
if (isset($_POST['check'])) {
	
	$sql = "SELECT * FROM hospitals where unm='".$_POST['unm']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$hnm = $row['hnm'];
$dstric = $row['dstric'];
$wrds = $row['wrds'];
$thetrs = $row['thetrs'];
$icub = $row['icub'];
$bds = $row['bds'];
$cont = $row['cont'];
$ambcnt = $row['ambcnt'];
$eml = $row['eml'];
$tpe = $row['tpe'];

}
?>

<html>
<head>
	<title>Health Care SL</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/font1.css">

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

<img src="images/hr.png" align="left" width="50px" height="50px"></img><p style="font-weight:bold">Health Care Management Sri Lanka</p>
<ul align="right"><li><a href="index.php">Logout</a></li></ul>

<hr>
<table align="center">
<form action="docsub.php" method="post"><tr><td>
<input name="vwhsp" type="submit" value="View_Hospitals" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td><td>
<input name="upptn" type="submit" value="Update_Patient_Log" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td><td>
<input name="adptn" type="submit" value="Add_patient" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td><td>
<input name="vwptn" type="submit" value="View_Patient_History" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td></tr>
</form>
</table>

<div class="containerr">
        <h2><?php echo $hnm;?></h2><br>
		<center><table>
		<tr><td width="10"></td><td><label>Hospital Type</label></td><td width="20"><label>:</label></td><td><label><?php echo $tpe;?></label></td></tr>
		<tr><td width="10"></td><td><label>District</label></td><td width="10"><label>:</label></td><td><label><?php echo $dstric;?></label></td></tr>
		<tr height="40"></tr>
		<tr><td></td><td></td><td></td><td><label>Number of wards available</label></td><td width="100"></td><td width="100"><label><?php echo $wrds;?></label></td></tr>
		<tr><td></td><td></td><td></td><td><label>Number of theaters available</label></td><td width="100"></td><td><label><?php echo $thetrs;?></label></td></tr>
		<tr><td></td><td></td><td></td><td><label>Number of ICU beds available</label></td><td width="100"></td><td><label><?php echo $icub;?></label></td></tr>
		<tr><td></td><td></td><td></td><td><label>Number of beds available</label></td><td width="100"></td><td><label><?php echo $bds;?></label></td></tr>
		<tr height="40"></tr>
		<tr><td width="10"></td><td><label>Hospital Contact</label></td><td width="20"><label>:</label></td><td><label><?php echo $cont;?></label></td></tr>
		<tr><td width="10"></td><td><label>Ambulance Contact</label></td><td width="10"><label>:</label></td><td><label><?php echo $ambcnt;?></label></td></tr>
		<tr><td width="10"></td><td><label>Hospital Email</label></td><td width="10"><label>:</label></td><td><label><?php echo $eml;?></label></td></tr>
		<tr height="40"></tr>
		</table>
		<form action="vwhsp.php?sr=1" method="post">
		<input name="dstric" type="hidden" value="<?php echo $dstric;?>">
		<input name="tpe" type="hidden" value="<?php echo $tpe;?>">
		<input name="search" type="submit" value="Back" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/>
		</form>
		</center>
		


</div>


</body>
</html>