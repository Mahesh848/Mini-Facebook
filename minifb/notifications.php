<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Notifications</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.note{
			background-color: white;
			padding: 10px;
			width: 650px;
			border-radius: 7px;
			margin-left: 400px;
			margin-top: 10px;
		}
		header{
			background-color: white;
			text-align: center;
		}
		.requests{
			background-color: #3333a5;
			overflow: hidden;
		}
		.requests a{
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<div class="requests">
		<div style="float:left; background-color: #3333a5;">
			<h1 style="padding-left: 10px;">Notifications</h1>
		</div>
			
		<div style="margin-left: 1200px; margin-top: 50px;">
			<a href="mainpage.php" style="background-color: white; padding: 5px;">Home</a>
		</div>
	</div>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$userid = $_SESSION['userid'];
		$notifications = mysql_query("SELECT * FROM Notifications WHERE receiver='$userid' ORDER BY id DESC") or die("error123");
		while($notification = mysql_fetch_array($notifications)){
			$matter = $notification['notification'];
			$id = $notification['id'];
			$imageid = $notification['post'];
			$read = $notification['read'];
			if($imageid!=0){
				if($read==0){
					echo "<div class='note'>
							<a href='view.php?imageid=$imageid' style='color: blue; text-decoration:none;'><b>$matter</b></a>
						</div>
					";
				}
				else{
					echo "<div class='note'>
							<a href='view.php?imageid=$imageid' style='color: blue; text-decoration:none;'>$matter</a>
						</div>
					";
				}
			}
			else{
				if($read==0){
					echo "<div class='note'>
							<b style='width:500px; box-sizing:border-box;'>$matter</b>
						</div>
					";
				}
				else{
					echo "<div class='note'>
							<m style='width:500px; box-sizing:border-box;'>$matter</m>
						</div>
					";
				}
			}
			mysql_query("UPDATE `Notifications` SET `read`='1' WHERE `id`='$id'") or die("error");
		}

	?>
</body>
</html>