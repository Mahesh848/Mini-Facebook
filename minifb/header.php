<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>header</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			
		}
		.navbar{
			background-color: #3333a5;
			overflow: hidden;
		}
		.navbar li{
			float: left;
			list-style-type: none;
		}
	</style>
</head>
<body onload="">
	<div class="navbar">
		<ul>
			<li style="margin-left: 20px; margin-top: 2px; font-size: 20px;"><a href="mainpage.php" style="text-decoration: none; color: black;">Home</a></li>
			<li style="margin-left: 20px;"><a href="friendrequest.php"><img src="friendrequest.png" style="width: 35px; height: 30px;"></a><sup>
						<?php
							mysql_connect("localhost","root","");
							mysql_select_db("Minifb");
							$userid = $_SESSION['userid'];
							$requests = 0;
							$requesttable = mysql_query("SELECT * FROM `Friendrequests` WHERE `read`='0' && `receiver`='$userid'");
							while($request = mysql_fetch_array($requesttable)){
								$requests++;
							}
							if($requests!=0){
								echo "<b style='background-color:red; padding:2px; border-radius:20px;'>$requests</b>";
							}
						?>
			</sup></li>
			<li style="margin-left: 20px;"><a href="messenger.php"><img src="messanger.png" style="width: 30px; height: 30px;"></a><sup>
				<?php
					mysql_connect("localhost","root","");
					mysql_select_db("Minifb");
					$userid = $_SESSION['userid'];
					$unreadresult = mysql_query("SELECT * FROM `chating` WHERE `receiver`='$userid' && `read`='0'");
					$unreadmessages = 0;
					while($unreadmessage = mysql_fetch_array($unreadresult)){
						$unreadmessages++;
					}
					if($unreadmessages!=0){
						echo "<b style='background-color:red; padding:2px; border-radius:20px;'>$unreadmessages</b>";
					}
				?>
			</sup></li>
			<li style="margin-left: 20px;"><a href="notifications.php"><img src="notification.png" style="width: 30px; height: 30px;"></a><sup id='unreadnotifications'>
								<?php
									mysql_connect("localhost","root","");
									mysql_select_db("Minifb");
									$userid = $_SESSION['userid'];
									$notificationstable = mysql_query("SELECT * FROM `Notifications` WHERE `read`='0' && `receiver`='$userid'") or die("error");	
									$number = 0;
									while($unread=mysql_fetch_array($notificationstable)){
											$number++;
									}
									if($number!=0){
										echo "<b style='background-color:red; padding:2px; border-radius:20px;'>$number</b>";
									}
								?>
					</sup></li>
		</ul>
	</div>
</body>
	   
</html>