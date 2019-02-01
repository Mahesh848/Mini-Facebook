<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>settings</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		header{
			background-color: #3333a5;
		}
		header h1{
			padding: 10px;
		}
		.settings{
			margin-left: 500px;
			margin-top: 50px;
		}
		input[type=text],input[type=password],input[type=date]{
			padding: 10px;
			margin-top: 10px;
			width: 200px;
		}
		input[type=submit]{
			padding: 7px;
			margin-left: 120px;
			margin-top: 10px;
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
			<h1 style="padding-left: 10px;">You Can Change Your Details</h1>
		</div>
			
		<div style="margin-left: 1200px; margin-top: 50px;">
			<a href="mainpage.php" style="background-color: white; padding: 5px;">Home</a>
		</div>
	</div>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$userid = $_SESSION['userid'];
		$userstable = mysql_query("SELECT * FROM `Users` WHERE `id`='$userid'");
		$firstname="";
		$surname = "";
		$username = "";
		$password = "";
		$dob = "";
		$profile = "";
		while($user = mysql_fetch_array($userstable)){
			$firstname = $user['firstname'];
			$surname = $user['surname'];
			$username = $user['username'];
			$password = $user['password'];
			$dob = $user['dob'];
			$profile = $user['profile'];
		}
	?>
	<div class="settings">
		<form action="update.php" method="post" enctype="multipart/form-data">
			Change Profile:<input type="file" name="profile" value="<?php $profile;?>" style="margin-left: 100px;"><br/>
			Change Firstname:<input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="Change Firstname" style="margin-left: 75px;"><br/>
			Change Surname:<input type="text" name="surname" value="<?php echo $surname; ?>" placeholder="Change Surname" style="margin-left: 85px;"> <br/>
			Change Username:<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Change Username" style="margin-left: 75px;"><br/>
			Change Password:<input type="password" name="password" value="<?php echo $password;?>" placeholder="Change Password" style="margin-left: 80px;"><br/>
			Change DateOfBirth:<input type="date" name="dob" value="<?php echo $dob; ?>" placeholder="Change DateOfBirth" style="margin-left: 60px;"><br/>
			<input type="submit" name="update" value="Update" style="margin-left: 280px;">
		</form>
	</div>
</body>
</html>