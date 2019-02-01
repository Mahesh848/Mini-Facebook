<!-- //d D -->
<!DOCTYPE html>
<html>
	<?php
		session_start();
		if(isset($_SESSION['userid'])){
			header("Location:mainpage.php");
		}
	?>
	<head>
		<title>Class</title>
		<style type="text/css" media="screen">
			body{
				font-family:Times,arial,Sans-serif;
				background-color:lightgrey;
			}
			header{
				background-color:#3333a5;
			}
			header ul{
				list-style: none;
				overflow: hidden;
			}
			header li{
				float: left;
				overflow: hidden;
			}
			.login{
				margin-left: 250px;
				margin-top: 50px;
			}
			.login input{
				border-radius: 0px;
				padding-left: 10px;
			}
			.bodi ul{
				list-style: none;
				overflow: hidden;
			}
			.bodi li{
				float: left;
			}
			.image{
				width: 550px;
				padding: 10px;
				margin-left: 100px;
				height: 500px;
				border: 2px solid lightgrey; 
				box-sizing: border-box;
			}
			.sign{
				margin-left: 100px;
			}
		</style>
	</head>
	<body>
		<header>
			<ul>
				<li style="margin-left: 130px; color: white;"><h1>MINI FACEBOOK</h1></li>
				<li>
					<div class = "login">
						<form action="" method="post" >
							<input type = "text" name="username" placeholder="Email or Phone number">
							<input type="password" name="password" placeholder="Password">
							<input type="submit" name="login" value="Login">
						</form>	
					</div>
				</li>
			</ul>
		</header>
		<div class="bodi">
			<ul>
				<li>
					<div class="image">
						<h2>This helps you connect and share with the people in your class.</h2>
						<img src="homeimage.png">
					</div>
				</li>
				<li>
					<div class="sign">
						<h1>Create an account</h1>
						<div class="signup">
							<form action="" method="post">
								<input type="text" name="firstname" placeholder="First name" style="padding: 5px; width: 130px; height: 30px; margin-bottom: 10px;" required>
								<input type="text" name="surname" placeholder="Surname" style="padding: 5px; width: 130px; height: 30px; margin-bottom: 10px;" required><br/>
								<input type="text" name="username" placeholder="Phone number or email address" style="padding: 5px; width: 280px; height: 30px; margin-bottom: 10px;" required><br/>
								<input type="password" name="password" placeholder="Password" style="padding: 5px; width: 280px; height: 30px; margin-bottom: 10px;" required><br/>
								Gender:<input type="radio" name="gender" value="male" required>Male
								<input type="radio" name="gender" value="female" required>Female<br/>
								<input type="date" name="dob" placeholder="Date Of Birth" style="padding: 5px; width: 280px; height: 30px; margin-top: 10px;" required><br/>
								<input type="submit" name="signup" value="SignUp" style="width: 100px; padding: 5px;height: 40px; margin-left: 90px; margin-top: 10px;">
							</form>
						</div>
					</div>	
				</li>	
			</ul>
		</div>
		<div class="hint">
			<?php
				mysql_connect("localhost","root","") or die("not connected to database");
				mysql_select_db("Minifb");
				if(isset($_POST['signup'])){
					$firstname = $_POST['firstname'];
					$surname = $_POST['surname'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					$gender = $_POST['gender'];
					$dob = $_POST['dob'];
					$profile = "profiles/default.png";
					mysql_query("INSERT INTO `Users`(`firstname`,`surname`,`username`,`password`,`gender`,`dob`,`profile`) VALUES('$firstname','$surname','$username','$password','$gender','$dob','$profile')");
				}
				if(isset($_POST['login'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$result = mysql_query("SELECT * FROM `Users` WHERE `username`='$username' && `password`='$password'");
					while($resultset = mysql_fetch_array($result)){
						$id = $resultset['id'];
						session_start();
						$_SESSION['userid'] = $resultset['id'];
						$cookie_name = "user";
						$cookie_value = "Alex Porter";
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						mysql_query("UPDATE `Users` SET `online`='1' WHERE `id`='$id'");
						header("Location:mainpage.php");
					}

				}
			?>
		</div>	
	</body>
</html>