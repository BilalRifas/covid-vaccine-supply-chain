<?php session_start();
if($_SESSION["id"]=="")
  header("location:index.php");
?>

<?php require_once('conn.php');
if (isset($_POST['search'])) {
	
			$query = mysql_query("SELECT * FROM hospitals where dstric ='".$_POST['dstric']."' && tpe ='".$_POST['tpe']."'");
			$array = array();
			$c=0;
			while($row = mysql_fetch_assoc($query)){
				
				$array[] = $row;
				$c++;
			}
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
        <h2>View Hospital Details</h2>
		<center><table><tr><td></td><td>
		<form action="vwhsp.php?sr=1" method="post">
		<select name="dstric" id="rm" style="width: 100%;padding: 8px 55px 8px 8px;border: none;outline: none;border-radius: 4px;background: rgb(255, 255, 255);font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;margin-bottom: 10px;"/>
<option selected>-Select the District-</option><option>Ampara</option>
<option>Anuradhapura</option><option>Badulla</option><option>Batticaloa</option><option>Colombo</option><option>Galle</option><option>Gampaha</option>
<option>Hambantota</option><option>Jaffna</option><option>Kalutara</option><option>Kandy</option><option>Kegalle</option><option>Kilinochchi</option>
<option>Kurunegala</option><option>Mannar</option><option>Matale</option><option>Matara</option><option>Monaragala</option><option>Mullaitivu</option>
<option>Nuwara Eliya</option><option>Polonnaruwa</option><option>Puttalam</option><option>Ratnapura</option><option>Trincomalee</option><option>Vavuniya</option>
</td><td>
<select name="tpe" id="rm" style="width: 100%;padding: 8px 55px 8px 8px;border: none;outline: none;border-radius: 4px;background: rgb(255, 255, 255);font-size: 14px;font-family: 'Yanone Kaffeesatz', sans-serif;letter-spacing: 1px;margin-bottom: 10px;"/>
<option selected>-Select Hospital Type-</option>
<option>Government</option>
<option>Private</option>
</td><td width="25"></td><td><input name="search" type="submit" value="Search"/></form></td></tr>
</table></center><center><table>
<?php
$idd = isset($_REQUEST['sr']);
	
	if($idd!=""){
		
		for ($i = 0; $i < count($array); $i++)
{
			echo "<form method=post action=vwhspd.php enctype=multipart/form-data><br>";
			echo "<input name=unm type=hidden value=".$array[$i]['unm'].">";
			echo "<tr><td></td><td><label>";
			echo $array[$i]['hnm'];
			echo "</label></td><td width=30</td>";
			echo "<td><label>";
			echo $array[$i]['dstric'];
			echo "</label></td><td width=30</td>";
			echo "<td><label>";
			echo $array[$i]['tpe'];
			echo "</label></td><td width=30</td>";
			echo "<td><label><input name=check type=submit value=Check style=font-size:14px;margin-top: 5px;width:120px;border-radius: 8px;/></td></tr>";
			echo "</form>";
}
	
	}


?>
<tr height="20"></tr>
</table>
</center>


</div>
</body>
</html>