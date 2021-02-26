<?php session_start(); require_once('conn.php');

if($_SESSION["id"]==""){
  header("location:index.php");
}
if(isset($_POST['addc'])){
	header("location:addc.php");
}else if (isset($_POST['adhsp'])) {
	header("location:adhsp.php");
}
?>
