<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
?>

<?php

$id = isset($_REQUEST['sr']);

if($id==""){
	$fnm = '';
	$lnm = '';
	$unm = '';
	$pw = '';
	$desig = '';
	$specl = '';
	
}else{
$fnm = $_REQUEST['fnm'];
$lnm = $_REQUEST['lnm'];
$unm = $_REQUEST['unm'];
$pw = $_REQUEST['pw'];
$desig = $_REQUEST['desig'];
$specl = $_REQUEST['specl'];
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
			<br><br>This Username is already exist. Please insert a new username.
		</div>
	</div>
</div>
<div id="popup2" class="overlay">
	<div class="popup">
		<h4><font color="Red"><strong><i>Health Care Management Sri Lanka</i></strong></font></h4>
		<a class="close" href="#"><font size="3px">x</font></a>
		<div class="content">
			<br><br>New doctor successfully inserted. Please send Username & Password via email.
		</div>
	</div>
</div>
<div id="popup3" class="overlay">
	<div class="popup">
		<h4><font color="Red"><strong><i>Health Care Management Sri Lanka</i></strong></font></h4>
		<a class="close" href="#"><font size="3px">x</font></a>
		<div class="content">
			<br><br>User account updated.
		</div>
	</div>
</div>
<div id="popup4" class="overlay">
	<div class="popup">
		<h4><font color="Red"><strong><i>Health Care Management Sri Lanka</i></strong></font></h4>
		<a class="close" href="#"><font size="3px">x</font></a>
		<div class="content">
			<br><br>User account terminated.
		</div>
	</div>
</div>

<img src="images/hr.png" align="left" width="50px" height="50px"></img><p style="font-weight:bold">Health Care Management Sri Lanka</p>
<ul align="right"><li><a href="index.php">Logout</a></li></ul>

<hr>
<table align="center">
<form action="syssub.php" method="post"><tr><td>
<input name="addc" type="submit" value="Doctor" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td><td>
<input name="adhsp" type="submit" value="Hospital" style="font-size:14px;margin-top: 5px;width:180px;border-radius: 8px;"/></td></tr>
</form>
</table>

<div class="containerr">
        <h2>Doctor Details</h2>
		<center><table><tr><td></td><td>
		<form action="addcsub.php" method="post">
		<input name="srh" type="text" class="other" placeholder="Username"></td><td>
		<input name="search" type="submit" value="Search"/>
		</form>
		</td></tr>
<tr>		
<form name="myform" onSubmit="return validateForm()" action="addcsub.php" method="post">
<td><label>First_Name</label></td><td></td><td><input id="textbox1" name="fnm" type="text" class="other" value="<?php echo $fnm;?>" required></td></tr><tr>
<td><label>Last_Name</label></td><td></td><td><input id="textbox2" name="lnm" type="text" class="other" value="<?php echo $lnm;?>" required></td></tr><tr>
<td><label>Designation</label></td><td></td><td><input id="textbox3" name="desig" type="text" class="other" value="<?php echo $desig;?>" required></td></tr><tr>
<td><label>Speciality</label></td><td></td><td><input id="textbox4" name="specl" type="text" class="other" value="<?php echo $specl;?>" required></td></tr><tr>
<td><label>Username</label></td><td></td><td><input id="textbox5" onkeyup="
  var start = this.selectionStart;
  var end = this.selectionEnd;
  this.value = this.value.toUpperCase();
  this.setSelectionRange(start, end);
" name="unm" type="text" class="other" value="<?php echo $unm; ?>" required <?php if($unm != ''){ echo 'readonly'; } ?>></td></tr><tr>
<td><label>Password</label></td><td></td><td><input id="textbox6" name="pw" type="text" class="other" value="<?php echo $pw;?>" required></td></tr>
<tr><td></td><td></td><td>
<input name="insert" type="submit" value="New"/>
<input name="update" type="submit" value="Modify"/>
<input name="delete" type="submit" value="Terminate"/>
<input name="clear" type="submit" value="Clear"/>
</td></tr>
</form>
</table></center><br>
</div>

</body>
</html>