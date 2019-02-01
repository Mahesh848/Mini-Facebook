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
	mysql_connect("localhost","root","") or die("error");
	mysql_select_db("Minifb");
	$comment = $_POST['comment'];
	$imageid = $_POST['imageid'];
	$uploadername = $_POST['uploadername'];
	$userid = $_SESSION['userid'];
	mysql_query("INSERT INTO Comments(userid,imageid,comment) VALUES('$userid','$imageid','$comment')");
	$imagestable = mysql_query("SELECT * FROM Images WHERE id='$imageid'");
	$receiver = "";
	while($comment = mysql_fetch_array($imagestable)){
		$receiver = $comment['uploader']; 
		$comments = $comment['comments'];
		$comments++;
		mysql_query("UPDATE Images SET comments='$comments' WHERE id='$imageid'");
	}
	$notification = "";
	$userstable = mysql_query("SELECT * FROM `Users` WHERE `id`='$userid'");
	while($user = mysql_fetch_array($userstable)){
		$notification = $user['firstname']." ".$user['surname'];
	}
	if($_SESSION['userid']!=$receiver){
		$notification = $notification." commented on a photo you uploaded";
		mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`,`post`,`read`) VALUES('$receiver','$notification','$imageid','0')");
	}
	header("Location:comments.php?imageid=$imageid&uploadername=$uploadername");
?>