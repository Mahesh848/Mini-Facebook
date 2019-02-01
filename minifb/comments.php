<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>comments</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.comments img{
			margin-left: 400px;
		}
		.comments h3{
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
		form{
			margin-left: 400px;
			margin-top: 10px;
		}
		input[type='text']{
			padding: 10px;
			width: 400px; 
		}
		input[type='submit']{
			padding:8px;
		}
		.comments{
			overflow-y: scroll;
			height: 550px;
		}
	</style>
</head>
<body onload="refresh()">
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$imageid = $_GET['imageid'];
		$uploadername	 = $_GET['uploadername'];
		$images = mysql_query("SELECT * FROM Images WHERE id='$imageid'");
		$location="";
		while($image = mysql_fetch_array($images)){
			$location = $image['location'];
		}
	?>
	<div class='comments' id='c'>
		<h3>Uploaded by <?php echo $uploadername ?></h3>
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
	<form action="sendcomment.php" method="post">
		<input type='number' name="imageid" value="<?php echo $imageid?>" style='display: none;'>
		<input type="text" name="uploadername" value="<?php echo $uploadername ?>" style='display: none;'>
		<input type='text' name='comment' placeholder='Comment.....' required>
		<input type="submit" name="submit" value="Send">
	</form>
</body>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function refresh(){		
	  		setTimeout(function(){
	  			//alert("mahesh");
	  			$('#comments').load("comments.php");
	  				refresh();
	  			},200);
	  	}
		setscroll();
		function setscroll(){
			//alert("raja");
			var size = $('#c').scrollTop();
		    $('#c').scrollTop(size+10000000);
		}
	</script>
</html>