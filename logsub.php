<?php session_start(); require_once('conn.php');
if(isset($_POST['log'])){
	
	
	$sql = "SELECT * FROM users where unm ='".$_POST['unm']."' and pw ='".$_POST['pw']."'";
$results=mysql_query($sql);
$row = mysql_fetch_assoc($results);
$unm = $row['unm'];
$pw = $row['pw'];
$tpe = $row['utp'];
$id = $row['uid'];


$_SESSION["id"] = $id;
$_SESSION["unm"] = $unm;

 if($_POST['unm'] == $unm && $_POST['pw'] == $pw && $tpe == 'hmanage'){
	 
		header("location:hmanage.php");
		
}elseif($_POST['unm'] == $unm && $_POST['pw'] == $pw && $tpe == 'doc'){
	 
		header("location:doc.php");
		
}elseif($_POST['unm'] == $unm && $_POST['pw'] == $pw && $tpe == 'sys'){
	 
		header("location:sys.php");
		
}
		
		else{
			
			header("location:index.php");
			
		}



}
	?>