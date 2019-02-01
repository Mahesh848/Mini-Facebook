<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>add friend</title>
</head>
<body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$sender = $_SESSION['userid'];
		$receiver = $_GET['id'];
		$read = 0;
		mysql_query("INSERT INTO `Minifb`.`Friendrequests`(`id`, `sender`, `receiver`, `read`) VALUES(NULL,'$sender','$receiver','$read')") or die("request fucking");
		$userstable = mysql_query("SELECT * FROM Users WHERE id='$sender'");
		$notification = "";
		while($user = mysql_fetch_array($userstable)){
			$notification = $notification.$user['firstname']." ".$user['surname'];
		}
		$notification = $notification." send a friendrequest to you";
		echo $notification;
		mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`,`read`) VALUES('$receiver','$notification','0')") or die("notification fucking");
		header("Location:mainpage.php");
	?>
</body>
</html>