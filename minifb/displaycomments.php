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
</head>
<body>
	<div id="com">
		
	</div>
</body>
<script type="text/javascript">
	like();
	function like(){	
		var ajaxreq = new XMLHttpRequest();
		ajaxreq.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {	
		   	  document.getElementById("com").innerHTML = this.responseText; 
			}
	  	};
	  	ajaxreq.open("GET","comments.php?imageid="+imageid&uploadername="mahesh",true);
 		ajaxreq.send();
	 }	
</script>
</html>