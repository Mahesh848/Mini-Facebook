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
	$userid = $_SESSION['userid'];
	$notificationstable = mysql_query("SELECT * FROM `Notifications` WHERE `read`='0' && `receiver`='$userid'") or die("error");	
	$number = 0;
	while($unread=mysql_fetch_array($notificationstable)){
		$number++;
	}
	if($number!=0){
		echo $number;
	}
	else{
		echo 0;
	}
?>