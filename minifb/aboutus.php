<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>AboutUs</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color: black;
		}
		.copyrights h1{
			margin-left: 350px;
			color: white;
			padding: 20px;
		}
		.copyrights{
			margin-top: 150px;
			background: url(snoww.gif);
		}
		.feedback h2{
			color: white;
			margin-left: 550px;
		}
		.feedback{
			margin-left: 70px;
		}
		.copyrights b{
			background-color: red;
			padding: 2px; 
		}
		.inspire{
			margin-left: 500px;
			margin-top: 100px;
		}
		a{
			text-decoration: none;
			background-color: black;
			margin-left: 1200px;
			color: white;
			padding: 10px;  
			display: block;
			width: 50px;
		}
		a:hover{
			background: white;
			color: black;
		}
	</style>
</head>
<body>
	<a href="mainpage.php">Home</a>
	<div class="feedback">
		<h2>FeedBack</h2>
		<form action="" method="post">
			<input type="text" name="feedback" placeholder="FeedBack........" required style=" margin-left:370px;width:500px;padding: 7px;"><br/>
			<input type="submit" name="submit" value="Submit" style=" margin-left:590px; margin-top: 10px; padding: 5px;">
		</form>	
	</div>
	<div class="inspire">
		<h1 style="color: white;">Inspired From Facebook</h1>
	</div>
	<div class="copyrights">
		<h1>All &copy;Rights Reserved to <b>Mahesh Ippili</b></h1>
	</div>
</body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$userid = $_SESSION['userid'];
		$userstable = mysql_query("SELECT * FROM `Users` WHERE `id`='$userid'");
		while($user = mysql_fetch_array($userstable)){
			$name = $user['firstname']." ".$user['surname'];
			if(isset($_POST['submit'])){
				$feedback = $_POST['feedback'];
				mysql_query("INSERT INTO `Feedback`(`name`,`feedback`) VALUES('$name','$feedback')");
			}
		}
	?>
</html>