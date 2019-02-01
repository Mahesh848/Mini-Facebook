<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>posts</title>
	<style type="text/css">
		.image{
			padding: 50px;
			width: 620px;
			height: 620px;
		}
		.like ul{
			list-style-type: none;
		}
		.comment ul{
			list-style-type: none;
		}
		.share ul{
			list-style-type: none;
		}
		.like li{
			float: left;
		}
		.comment li{
			float: left;
		}
		.share li{
			float: left;
		}
		.like{
			float: left;
		}
		.comment{
			float: left;
		}
		.share{
			float: left;
		}
		.numbers{
			float: left;
		}
	</style>
</head>
<body>
	<?php
		mysql_connect("localhost","root","") or die("mysql error");
		mysql_select_db("Minifb");
		$table = mysql_query("SELECT * FROM `Images` ORDER BY `id` desc");
		while($image = mysql_fetch_array($table)){
			$location = $image['location'];
			$imageid = $image['id'];
			$uploaderid = $image['uploader'];
			$likes = $image['likes'];
			$comments = $image['comments'];
			$shares = $image['shares'];
			$type = $image['type'];
			$uploadername = "";
			$users = mysql_query("SELECT * FROM Users WHERE id='$uploaderid'");
			while($userrow = mysql_fetch_array($users)){
				$uploadername = $userrow['firstname']." ".$userrow['surname'];
			}
			$friends = 0;
			$userid = $_SESSION['userid'];
			$friendstable = mysql_query("SELECT * FROM `Friends` WHERE (`friend1`='$userid' && `friend2`='$uploaderid') || (`friend1`='$uploaderid' && `friend2`='$userid')");
			while($friend = mysql_fetch_array($friendstable)){
				$friends = 1;
			}
			if($uploaderid==$userid){
				$friends = 1;
			}
			$heading = "";
			if($type==0){
				$heading = "Posted By ".$uploadername;
			}
			if($type==-1){
				$heading = $uploadername." Updated his Profile";
			}
			if($type>=1){
				$users = mysql_query("SELECT * FROM Users WHERE id='$type'");
				$originalname = "";
				while($userrow = mysql_fetch_array($users)){
					$originalname = $userrow['firstname']." ".$userrow['surname'];
				}
				if($type==$uploaderid){
					$heading = $uploadername." Shares His Post";
				}
				else{
					$heading = $uploadername." Shares ".$originalname." Post";
				}
			}	
			if($friends==1 || $type>=1){
			echo"
				<div class='image' style='margin-left: 300px; background-color: white; margin-top: 50px;'>
					<h3>$heading</h3>
					<img src='$location' height='500px' width='600px'>
					<div class='foot'>
						<div class='like'>
							<ul>
								<li><img src='like.png'></li>
								<li><button onclick='like(\"$imageid\"); refresh(\"$imageid\");' style='border:none; padding:5px; color:black; background-color:white; cursor:pointer;'>Like</button></li>
							</ul>
						</div>
						<div class='comment'>
							<ul>
								<li><img src='comment.png'></li>
								<li><a href='comments.php?imageid=$imageid&uploadername=$uploadername' style='text-decoration: none; color:black;'>Comment</a></li>
							</ul>	
						</div>	
						<div class='share'>
							<ul>
								<li><img src='share.png'></li>
								<li><a href='share.php?imageid=$imageid' style='text-decoration: none; color:black;'>Share</a></li>
							</ul>
						</div>
					</div>
					<div class='numbers'>
						<div id='likeid' class='nooflikes' style='float:left; width:100px; border: 1px solid white; box-sizing:border-box; margin-left: 30px; margin-right: 40px;'>
							$likes
						</div>
						<div id='commentid' class='noofcomments' style='float:left; width:100px; border: 1px solid white; box-sizing:border-box; margin-right: 60px;'>
							$comments
						</div>
						<div id='shareid' class='noofshares' style='float:left; width:100px; border: 1px solid white; box-sizing:border-box;'>
							$shares
						</div>
					</div>	
				</div>	
			";
		}
		}
	?>
</body>
</html>
