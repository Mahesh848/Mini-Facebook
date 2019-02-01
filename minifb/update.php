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
	if(isset($_POST['update'])){
		$userid = $_SESSION['userid'];
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$dob = $_POST['dob'];
		mysql_query("UPDATE `Users` SET `firstname`='$firstname',`surname`='$surname',`username`='$username',`password`='$password',`dob`='$dob' WHERE `id`='$userid'") or die("updating fail");
		$name=$_FILES['profile']['name'];
		$temp_loc = $_FILES['profile']['tmp_name'];
		$ext=end((explode(".",$name)));
		$newname = $userid.".".$ext;
		$file_storage = "profiles/".$newname;
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			if(move_uploaded_file($temp_loc,$file_storage)){
				mysql_query("UPDATE `Users` SET `profile`='$file_storage' WHERE `id`='$userid'") or die("updating error");	
				mysql_query("INSERT INTO `Images`(`location`,`uploader`,`type`) VALUES('$file_storage','$userid','-1')");
			}
		}	
		header("Location:settings.php");
	}
?>