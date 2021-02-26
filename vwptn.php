<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
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
        <h2>Download Patient Report</h2>
		<center><table><tr><td></td><td>
		<form action="vwptnsub.php" method="post">
		<input name="nic" type="text" class="other" placeholder="NIC"></td><td>
		<input name="search" type="submit" value="Download"/>
		</form>
</div>

</body>
</html>