<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>View</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.comments img{
			margin-left: 400px;
		}
		.comment{
			margin-top: 10px;
			background-color: white;
			border-radius: 10px;
			margin-left: 400px;
			padding-left: 10px;
			width: 490px;
		}
		.comments{
			margin-top: 50px;
			overflow-y: scroll;
			height: 550px;
		}
	</style>
</head>
<body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$imageid = $_GET['imageid'];
		$images = mysql_query("SELECT * FROM Images WHERE id='$imageid'");
		$location="";
		while($image = mysql_fetch_array($images)){
			$location = $image['location'];
		}
	?>
	<div class='comments' id='c'>
		<img src='<?php echo $location ?>' height='500px;' width='500px;'>
		<?php
			$commentstable = mysql_query("SELECT * FROM Comments WHERE imageid='$imageid'");
			while($comment = mysql_fetch_array($commentstable)){
				$userid = $comment['userid'];
				$username = "";
				$com = $comment['comment'];
				$userstable = mysql_query("SELECT * FROM Users WHERE id='$userid'");
				while($user=mysql_fetch_array($userstable)){
					$username = $user['firstname']." ".$user['surname'];
				}
				echo "
					<div class='comment'>
							$username: $com
					</div>
				";
			}
		?>
	</div>	
</body>
</html>
