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
	$message = $_GET['message'];
	$rec = $_GET['click'];
	$sen = $_SESSION['userid'];
	$read = 0;
	if(mysql_query("INSERT INTO `chating`(`sender`,`receiver`,`message`,`read`) VALUES('$sen','$rec','$message','$read')")){
		echo "success";
	}
	else{
		echo "fail";
	}

?>