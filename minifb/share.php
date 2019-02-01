<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Share</title>
</head>
<body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$imageid = $_GET['imageid'];
		$imagestable = mysql_query("SELECT * FROM `Images` WHERE `id`='$imageid'");
		$uploader  = 0;
		$location = "";
		while($images = mysql_fetch_array($imagestable)){
			$uploader = $images['uploader'];
			$location = $images['location'];
			$shares = $images['shares'];
		}
		$shares++;
		mysql_query("UPDATE `Images` SET `shares`='$shares' WHERE id='$imageid'");
		$sharer = $_SESSION['userid'];
		mysql_query("INSERT INTO `Images`(`location`,`uploader`,`type`) VALUES('$location','$sharer','$uploader')");
		$usertable = mysql_query("SELECT * FROM `Users` WHERE `id`='$sharer'");
		$notification = "";
		while($user=mysql_fetch_array($usertable)){
			$notification = $user['firstname']." ".$user['surname'];
		}
		$notification = $notification." shared a post you posted";
		if($_SESSION['userid']==$uploader){
			mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`,`post`,`read`) VALUES('$uploader','$notification','$imageid','0')");
		}
		header("Location:mainpage.php");
	?>
</body>
</html>