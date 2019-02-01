<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>searching</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.name{
			margin-left: 400px;
			margin-top: 20px;
			background-color: white;
			padding:10px;
			width: 500px; 
		}
		.name li{
			list-style-type: none;
		}
	</style>
</head>
<body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$userstable = mysql_query("SELECT * FROM Users");
		$value = $_POST['search'];
		$len = strlen($value);
		$elsee = 0;
		$login = $_SESSION['userid'];
		echo"<p style='font-size: 35px; background-color:white; text-align:center;'>Results For $value</p>";
		while($user=mysql_fetch_array($userstable)){
			$i = 0;
			$j = 0;
			$matches = 0;
			$id = $user['id'];
			$name = $user['firstname']." ".$user['surname'];
			$firstname = $user['firstname'];
			$surname = $user['surname'];
			$length = strlen($surname);
			while($i<$len && $j<$length){
				if($value[$i]==$surname[$j]){
					$matches++;
				}
				$i++;
				$j++;
			}
			$j=0;
			if ($i>=$length) $i = 0;
			$length = strlen($firstname);
			while($i<$len && $j<$length){
				if($value[$i]==$firstname[$j]){
					$matches++;
				}
				$i++;
				$j++;
			}
			$j=0;
			if ($i>=$length) $i = 0;
			$length = strlen($name);
			while($i<$len && $j<$length){
				if($value[$i]==$name[$j]){
					$matches++;
				}
				$i++;
				$j++;
			}
			if($matches>=$len/2){
				$mahesh = 0;
				$friendstable = mysql_query("SELECT * FROM `Friends` WHERE (`friend1`='$id' && `friend2`='$login') || (`friend1`='$login' && `friend2`='$id')") or die("error1");
				while($friend=mysql_fetch_array($friendstable)){
						echo "<div class='name'>
							<li>$name<a style='margin-left: 300px; text-decoration:none;'>Friends</a></li>	 
						</div>";
						$mahesh = 1;
				}
				if($mahesh==0){
					$requesttable = mysql_query("SELECT * FROM `Friendrequests` WHERE `sender`='$login' && `receiver`='$id'") or die("error2");
					while($request = mysql_fetch_array($requesttable)){
						$mahesh = 1;
						echo "<div class='name'>
								<li>$name<a style='margin-left: 270px; text-decoration:none;'>FriendRequest Sent</button></a>	 
							</div>";
					}
				}
				if($id==$login){
					$mahesh=1;
					echo "<div class='name'>
								<li>$name<a style='margin-left: 270px; text-decoration:none;'>You</button></a>	 
							</div>";
				}
				if($mahesh==0){	
					echo "<div class='name'>
							<li>$name<a href='addfriend.php?id=$id' style='margin-left: 300px; text-decoration:none;'>Add Friend</a></li>	 
					</div>";
				}	
				$elsee = 1;
			}
		}
		if($elsee==0){
			echo "<p style='margin-left:550px; font-size: 25px;'>No Results Found</p>";
		}	
	 ?>
</body>
</html>