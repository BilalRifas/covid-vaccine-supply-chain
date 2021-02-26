<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
?>

<?php require_once('conn.php');

$t = 0;
$re = 0;

$sql = "SELECT * FROM hospitals where unm='".$_SESSION['unm']."'";
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
	 if($tpe=='Government'){
		 $t = 1;
	 }else if($tpe=='Private'){
		 $t = 2;
	 }
 
	 if($dstric=='Ampara'){
		 $re = 1;
	 }else if($dstric=='Anuradhapura'){
		 $re = 2;
	 }else if($dstric=='Badulla'){
		 $re = 3;
	 }else if($dstric=='Batticaloa'){
		 $re = 4;
	 }else if($dstric=='Colombo'){
		 $re = 5;
	 }else if($dstric=='Galle'){
		 $re = 6;
	 }else if($dstric=='Gampaha'){
		 $re = 7;
	 }else if($dstric=='Hambantota'){
		 $re = 8;
	 }else if($dstric=='Jaffna'){
		 $re = 9;
	 }else if($dstric=='Kalutara'){
		 $re = 10;
	 }else if($dstric=='Kandy'){
		 $re = 11;
	 }else if($dstric=='Kegalle'){
		 $re = 12;
	 }else if($dstric=='Kilinochchi'){
		 $re = 13;
	 }else if($dstric=='Kurunegala'){
		 $re = 14;
	 }else if($dstric=='Mannar'){
		 $re = 15;
	 }else if($dstric=='Matale'){
		 $re = 16;
	 }else if($dstric=='Matara'){
		 $re = 17;
	 }else if($dstric=='Monaragala'){
		 $re = 18;
	 }else if($dstric=='Mullaitivu'){
		 $re = 19;
	 }else if($dstric=='Nuwara Eliya'){
		 $re = 20;
	 }else if($dstric=='Polonnaruwa'){
		 $re = 21;
	 }else if($dstric=='Puttalam'){
		 $re = 22;
	 }else if($dstric=='Ratnapura'){
		 $re = 23;
	 }else if($dstric=='Trincomalee'){
		 $re = 24;
	 }else if($dstric=='Vavuniya'){
		 $re = 25;
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
			<br><br>Hospital details updated!
		</div>
	</div>
</div>

<img src="images/hr.png" align="left" width="50px" height="50px"></img><p style="font-weight:bold">Health Care Management Sri Lanka</p>
<ul align="right"><li><a href="index.php">Logout</a></li></ul>

<hr>

<div class="containerrr">
<center><table><tr><td width="360"><h2>Hospital Management</h2></td><td></table></center>
<br><br><center><table>
<tr>		
<form name="myform" onSubmit="return validateForm();" action="hspsub.php" method="post">
<td><label>Hospital Name</label></td><td width="10"></td><td><input id="textbox1" name="hnm" type="text" value="<?php echo $hnm; ?>" class="other" required></td><td width="100"></td>
<td><label>Type</label></td><td width="10"></td><td>
<select name="tpe" id="rm" style="width: 100%;padding: 8px 55px 8px 8px;border: none;outline: none;border-radius: 4px;background: rgb(255, 255, 255);font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;margin-bottom: 10px;"/>
<option <?php if ($t == 1){ echo "selected"; }?>>Government</option>
<option <?php if ($t == 2){ echo "selected"; }?>>Private</option>
</td></tr>

<tr><td><label>District</label></td><td></td><td>
<select name="dstric" id="rm" style="width: 100%;padding: 8px 55px 8px 8px;border: none;outline: none;border-radius: 4px;background: rgb(255, 255, 255);font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;margin-bottom: 10px;"/>
<option <?php if ($re == 1){ echo "selected"; }?>>Ampara</option>
<option <?php if ($re == 2){ echo "selected"; }?>>Anuradhapura</option><option <?php if ($re == 3){ echo "selected"; }?>>Badulla</option><option <?php if ($re == 4){ echo "selected"; }?>>Batticaloa</option><option <?php if ($re == 5){ echo "selected"; }?>>Colombo</option><option <?php if ($re == 6){ echo "selected"; }?>>Galle</option><option <?php if ($re == 7){ echo "selected"; }?>>Gampaha</option>
<option <?php if ($re == 8){ echo "selected"; }?>>Hambantota</option><option <?php if ($re == 9){ echo "selected"; }?>>Jaffna</option><option <?php if ($re == 10){ echo "selected"; }?>>Kalutara</option><option <?php if ($re == 11){ echo "selected"; }?>>Kandy</option><option <?php if ($re == 12){ echo "selected"; }?>>Kegalle</option><option <?php if ($re == 13){ echo "selected"; }?>>Kilinochchi</option>
<option <?php if ($re == 14){ echo "selected"; }?>>Kurunegala</option><option <?php if ($re == 15){ echo "selected"; }?>>Mannar</option><option <?php if ($re == 16){ echo "selected"; }?>>Matale</option><option <?php if ($re == 17){ echo "selected"; }?>>Matara</option><option <?php if ($re == 18){ echo "selected"; }?>>Monaragala</option><option <?php if ($re == 19){ echo "selected"; }?>>Mullaitivu</option>
<option <?php if ($re == 20){ echo "selected"; }?>>Nuwara Eliya</option><option <?php if ($re == 21){ echo "selected"; }?>>Polonnaruwa</option><option <?php if ($re == 22){ echo "selected"; }?>>Puttalam</option><option <?php if ($re == 23){ echo "selected"; }?>>Ratnapura</option><option <?php if ($re == 24){ echo "selected"; }?>>Trincomalee</option><option <?php if ($re == 25){ echo "selected"; }?>>Vavuniya</option>
</td></tr>
<tr><td><label>Number of wards</label></td><td width="10"></td><td><input id="textbox1" name="wrds" value="<?php echo $wrds; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Number of Operating theaters</label></td><td width="10"></td><td><input id="textbox1" name="thetrs" value="<?php echo $thetrs; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Number of ICU beds</label></td><td width="10"></td><td><input id="textbox1" name="icub" value="<?php echo $icub; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Number of beds</label></td><td width="10"></td><td><input id="textbox1" name="bds" value="<?php echo $bds; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Contact Number</label></td><td width="10"></td><td><input id="textbox1" name="cont" value="<?php echo $cont; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Ambulance Contact</label></td><td width="10"></td><td><input id="textbox1" name="ambcnt" value="<?php echo $ambcnt; ?>" type="text" class="other" required></td></tr>
<tr><td><label>Email</label></td><td width="10"></td><td><input id="textbox1" name="eml" value="<?php echo $eml; ?>" type="text" class="other" required></td></tr>
</table></center>
<center><input name="update" type="submit" value="Update"/></center>
</form>
<br>
</div>

</body>
</html>