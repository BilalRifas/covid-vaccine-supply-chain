<?php session_start(); require_once('conn.php');

if($_SESSION["id"]==""){
  header("location:index.php");
}
if(isset($_POST['vwhsp'])){
	header("location:vwhsp.php");
}else if (isset($_POST['upptn'])) {
	header("location:upptn.php");
}else if (isset($_POST['adptn'])) {
	header("location:adptn.php");
}else if (isset($_POST['vwptn'])) {
	header("location:vwptn.php");
}
?>
