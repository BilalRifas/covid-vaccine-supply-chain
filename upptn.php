<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
?>

<?php

$id = isset($_REQUEST['sr']);

if($id==""){
	$fnm = '';
	$lnm = '';
	$nic = '';
	
}else{
$fnm = $_REQUEST['fnm'];
$lnm = $_REQUEST['lnm'];
$nic = $_REQUEST['nic'];
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

<style type="text/css">

.box {
  width: 20%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: red;
}
.popup .content {
  max-height: 50%;
  overflow: auto;
  font-size: 13.5px;
}
</style>

</head>
<body>

<div id="popup1" class="overlay">
	<div class="popup">
		<h4><font color="Red"><strong><i>Health Care Management Sri Lanka</i></strong></font></h4>
		<a class="close" href="#"><font size="3px">x</font></a>
		<div class="content">
			<br><br>Record Added.
		</div>
	</div>
</div>

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
        <h2>Patient Logs</h2>
		<center><table><tr><td></td><td>
		<form action="upptnsub.php" method="post">
		<input name="srh" type="text" class="other" placeholder="NIC"></td><td>
		<input name="search" type="submit" value="Search"/>
		</form>
		</td></tr>
<tr>		
<form name="myform" onSubmit="return validateForm()" action="upptnsub.php" method="post">
<input name="nic" type="hidden" value="<?php echo $nic;?>">
<td><label>First Name</label></td><td></td><td><input id="textbox2" name="fnm" type="text" class="other" value="<?php echo $fnm;?>" required readonly></td></tr><tr>
<td><label>Last Name</label></td><td></td><td><input id="textbox3" name="lnm" type="text" class="other" value="<?php echo $lnm;?>" required readonly></td></tr><tr>
<td><label>Date</label></td><td></td><td><input id="textbox4" name="dt" type="date" class="other" value="" required></td></tr><tr>
<td><label>Reason</label></td><td></td><td><input id="textbox5" name="rsn" type="text" class="other" value="" required></td></tr><tr>
<td><label>Status</label></td><td></td><td>
<select name="stts" id="rm" style="width: 100%;padding: 8px 55px 8px 8px;border: none;outline: none;border-radius: 4px;background: rgb(255, 255, 255);font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;margin-bottom: 10px;"/>
<option selected>Normal</option>
<option>Important</option>
</td></tr><tr>
<td><label>Comment</label></td><td></td><td><textarea name="cm" rows="8" cols="35" style="width: 95%;border: none;outline: none;border-radius: 4px;font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;" required></textarea></td></tr>
</td></tr>
<tr><td></td><td></td><td>
<input name="insert" type="submit" value="Add Record" style="width: 50%;"/>
</td></tr>
</form>
</table></center><br>
</div>

</body>
</html>