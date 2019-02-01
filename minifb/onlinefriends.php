<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>unread</title>
	<style type="text/css">
		h4{
			margin-left: 80px;
		}
	</style>
</head>
<body>
	<h4>Online</h4>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Minifb");
		$user = $_SESSION['userid'];
		$table = mysql_query("SELECT * FROM `Users`");
		$name = "";
		while($row = mysql_fetch_array($table)){
			$uname = $row['id'];
			$profile = $row['profile'];
			$name = $row['firstname']." ".$row['surname'];
			$table1 = mysql_query("SELECT * FROM `chating`");
			$unread = 0;
			$reciever = $row['id'];
			while($row1 = mysql_fetch_array($table1)){
				if($row1['sender']==$reciever && $row1['receiver']==$user && $row1['read']==0){
					$unread++;
				}
			}
			$friend = 0;
			$online = 0;
			if($row['online']==1){
				$online = 1;
			}
			$friendslist = mysql_query("SELECT * FROM `Friends` WHERE (`friend1`='$uname' && `friend2`='$user') || (`friend1`='$user' && `friend2`='$uname')");
			while($f = mysql_fetch_array($friendslist)){
				$friend = 1;
			}
			if($user!=$row['id'] && $friend==1 && $online==1){
	?>
			<div class='chats'>	
				<div style="float: left; background-color: white; padding: 5px;">
					<img src="<?php echo $profile; ?>" style="width: 40px; height: 40px; border-radius: 30px;">
				</div>
				<button type='button' value="<?php echo $name ?>" onclick='loading("<?php echo $uname?>","<?php echo $uname ?>","<?php echo $name ?>"); printname(); setscroll();' ><?php echo $name;?> </button><sup> <?php  if($unread) echo $unread; ?> </sup>
			</div>
	<?php
		}
	}
	?>
</body>
</html>
