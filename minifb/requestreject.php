<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Minifb");
	$receiver = $_GET['id'];
	$rid = $_GET['rid'];
	$userid = $_SESSION['userid'];
	$notification = "";
	$userstable = mysql_query("SELECT * FROM `Users` WHERE `id`='$userid'");
	while($user = mysql_fetch_array($userstable)){
		$notification = $notification.$user['firstname']." ".$user['surname'];
	}
	$notification = $notification." "."rejects your request";
	mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`) VALUES('$receiver','$notification')") or die("error");
	mysql_query("DELETE FROM `Friendrequests` WHERE `id`='$rid'") or die("eorr delete");
	header("Location:friendrequest.php");
?>