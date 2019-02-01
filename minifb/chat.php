<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>chat</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.sender{
			margin-left:340px;
			background-color:white;
			border-bottom-right-radius:20px ;
			border-top-left-radius:20px ;
			padding: 7px;
			border:1px solid lightgrey;
			width: 300px;
			box-sizing: border-box;
		}
		.reciever{
			margin-left:0px;
			background-color:white;
			border-bottom-left-radius: 20px;
			border-top-right-radius: 20px;
			padding:7px;
			border:1px solid lightgrey;
			width: 300px;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Minifb");
	$sen = $_SESSION['userid'];
	$rec = $_GET['click'];
	$usen = "";
	$table1 = mysql_query("SELECT * FROM `Users`");
	while($row = mysql_fetch_array($table1)){
		if($row['id']==$sen){
			$usen = $row['id'];
			break;
		}
	}
	if(isset($_POST['message'])){
		$s = $usen;
		$r = $rec;
		$m = $_POST['message'];
		$read = 0;
		mysql_query("INSERT INTO `chating`(`sender`,`receiver`,`message`,`read`) VALUES('$s','$r','$m','$read')") or die("error...");
	}
	$table = mysql_query("SELECT * FROM `chating`");
	while($r = mysql_fetch_array($table)){
		if($usen==$r['sender'] && $rec==$r['receiver']){
			$mes = $r['message'];
			echo "<div class='sender'>$mes</div>";
			echo "<br/>";
		}
		if($usen==$r['receiver'] && $rec==$r['sender']){
			if($r['read']==0){
				$id = $r['id'];
				mysql_query("UPDATE `chating` SET `read`='1' WHERE `chating`.`id`='$id'") or die("fucking........");
			}
			$mes = $r['message'];
			echo "<div class='reciever'>$mes</div>";
			echo "<br/>";
		}

	}
?>
<script type="text/javascript">
	//setscroll();
</script>
</body>
</html>
