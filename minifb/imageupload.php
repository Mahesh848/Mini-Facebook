<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Status</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.not{
			margin-left: 500px;
			margin-top: 200px;
		}
	</style>
</head>
<body>

</body>
</html>
<?php
	if(isset($_FILES['file'])){
		$name=$_FILES['file']['name'];
		//echo $name;
		$temp_loc = $_FILES['file']['tmp_name'];
		$file_storage = "posts/".$name;
		$ext=end((explode(".",$name)));
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="svg"){
			if(move_uploaded_file($temp_loc,$file_storage)){
				mysql_connect("localhost","root","") or die ("mysql() error");
				mysql_select_db("Minifb");
				$uploader = $_SESSION['userid'];
				//echo $uploader;
				$location = "posts/".$name;
				$likes = 0;
				mysql_query("INSERT INTO `Images`(location,uploader,likes) VALUES('$location','$uploader','$likes')") or die("error");
				//echo "file uploaded";
				header("Location:mainpage.php");

			}
			else{
				echo "<div class='not'>
						file not uploaded
						<a href='mainpage.php'>OK</a>
				</div>";
			}
		}
		else{
			echo "<div class='not'>
				file not uploaded
				<a href='mainpage.php'>OK</a>
			</div>";
		}			
	}
	else{
		echo "fucking...";
	}
?>