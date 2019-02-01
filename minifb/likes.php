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
	$chi=0;
	mysql_connect("localhost","root","");
	mysql_select_db("Minifb");
	$checkr=mysql_query("SELECT * FROM likes");
	$like=$_GET['id'];
	$usri=$_SESSION['userid'];
	while($che=mysql_fetch_array($checkr)){
		if($che['image']==$like && $che['liker']==$usri){
			$chi=1;
			break;
		}
	}
	if($chi==0){
		mysql_query("INSERT INTO likes(liker,image) VALUES('$usri','$like')");
		$query=mysql_query("SELECT * FROM Images WHERE id='$like' ");
		$receiver = "";
		while($row=mysql_fetch_assoc($query)){
			$receiver = $row['uploader'];
			$likes=$row['likes'];
		}
		$likes++;
		echo $likes;
		mysql_query("UPDATE `Images` SET `likes` = '$likes' WHERE `Images`.`id` = '$like'");
		$userstable = mysql_query("SELECT * FROM `Users` WHERE `id`='$usri'");
		$notification = "";
		while($user = mysql_fetch_array($userstable)){
			$notification = $user['firstname']." ".$user['surname'];
		}
		if($_SESSION['userid']!=$receiver){
			$notification = $notification." likes a photo you uploaded";
			mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`,`post`,`read`) VALUES('$receiver','$notification','$like','0')");
		}	
	}
	else{
		$query  = mysql_query("SELECT * FROM Images WHERE id='$like'");
		while($row=mysql_fetch_assoc($query)){
			$likes=$row['likes'];
		}
		echo $likes;
	}
?>
