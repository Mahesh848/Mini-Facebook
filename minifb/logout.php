<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Minifb");
	session_start();
	$id = $_SESSION['userid'];
	mysql_query("UPDATE `Users` SET `online`='0' WHERE `id`='$id'") or die("error");
	unset($_SESSION['userid']);
	session_destroy();
	header("Location:login.php");
?>