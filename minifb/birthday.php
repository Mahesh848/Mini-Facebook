<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Minifb");
	$date = date("m-d");
	//echo $date;
	$userstable = mysql_query("SELECT * FROM `Users`");
	while($user = mysql_fetch_array($userstable)){
		$userid = $user['id'];
		$name = $user['firstname']." ".$user['surname'];
		$dob = $user['dob'];
		$birthday = "";
		$i = 0;$temp = 0;
		while($i<strlen($dob)){
			if($temp==1){
				$birthday = $birthday.$dob[$i];
			}
			if($dob[$i]=='-'){
				$temp = 1;
			}
			$i++;
		}
		//echo $birthday;
		if($date==$birthday){
			//echo "happy birthday  ".$name;
			$resultset = mysql_query("SELECT * FROM `Users`");
			while($result=mysql_fetch_array($resultset)){
				$friendid = $result['id'];
				$friends = mysql_query("SELECT * FROM `Friends` WHERE (`friend1`='$userid' && `friend2`='$friendid') || (`friend1`='$friendid' && `friend2`='$userid')");
				while($friend=mysql_fetch_array($friends)){
					$receiver = $friendid;
					if($userid!=$receiver){
						$notification = "Today is ".$name." Birthday";
						mysql_query("INSERT INTO `Notifications`(`receiver`,`notification`,`read`) VALUES('$receiver','$notification','0')");
					}
				}
			}
		} 
	}
					
?>