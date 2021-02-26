<?php session_start(); require_once('conn.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE hospitals SET hnm='".$_POST['hnm']."', dstric='".$_POST['dstric']."', wrds='".$_POST['wrds']."', thetrs='".$_POST['thetrs']."', icub='".$_POST['icub']."', bds='".$_POST['bds']."', cont='".$_POST['cont']."', ambcnt='".$_POST['ambcnt']."', eml='".$_POST['eml']."', tpe='".$_POST['tpe']."' WHERE unm ='".$_SESSION['unm']."'";
	$results=mysql_query($sql);

		header("location:hmanage.php?#popup1");
		
	}