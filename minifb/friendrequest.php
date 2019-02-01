<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Friendrequests</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.request{
			margin-left: 400px;
			background-color: white;
			width: 700px;
			margin-top: 20px;
			padding: 10px;
		}
		h2{
			padding: 10px;
			text-align: center;
		}
		.name{
			margin-left: 400px;
			margin-top: 20px;
			background-color: white;
			padding:10px;
			width: 700px; 
		}
		.name li{
			list-style-type: none;
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
			<h1 style="padding-left: 10px;">FriendRequests to you</h1>
		</div>
			
		<div style="margin-left: 1200px; margin-top: 50px;">
			<a href="mainpage.php" style="background-color: white; padding: 5px;">Home</a>
		</div>
	</div>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$user = $_SESSION['userid'];
		$requesttable = mysql_query("SELECT * FROM `Friendrequests` WHERE receiver='$user' ORDER BY id DESC") or die("error");
		while($request = mysql_fetch_array($requesttable)){
			$id = $request['id'];
			$senderid = $request['sender'];
			$userstable = mysql_query("SELECT * FROM `Users` WHERE id='$senderid'") or die("error2");
			$sendername = "";
			while($users = mysql_fetch_array($userstable)){
				$sendername = $users['firstname']." ".$users['surname'];
			}
			echo "
				<div class='request'>
					$sendername
					<a href='requestaccept.php?id=$senderid&rid=$id' style='margin-left:250px; margin-right:30px;'>Accept</a>
					<a href='requestreject.php?id=$senderid&rid=$id' style=''>Reject</a>
				</div>
			";
			mysql_query("UPDATE `Friendrequests` SET `read`='1' WHERE `id`='$id'") or die("error");
		}
	?>
	<h2>People You May Know</h2>
	<?php
		$userstable = mysql_query("SELECT * FROM `Users`");
		$presentid = $_SESSION['userid'];
		while($user = mysql_fetch_array($userstable)){
			$id = $user['id'];
			$name = $user['firstname']." ".$user['surname'];
			if($presentid!=$id){
				$checkresult = mysql_query("SELECT * FROM `Friends` WHERE (friend1='$presentid' && friend2='$id') || (friend1='$id' && friend2='$presentid') ") or die("checkingerror");
				$c = 0;
				while($check=mysql_fetch_array($checkresult)){
					$c  = 1;
				}
				if($c==0){
					$checkresult = mysql_query("SELECT * FROM `Friendrequests` WHERE `sender`='$presentid' && `receiver`='$id'") or die("error2checking");
					while($check=mysql_fetch_array($checkresult)){
						$c  = 1;
					}
				}
				if($c==0){
					echo "<div class='name'>
							<li>$name<a href='addfriend1.php?id=$id' style='margin-left: 300px; text-decoration:none;'>Add Friend</a></li>	 
					</div>";
				}
			}
		}
	?>
</body>
</html>