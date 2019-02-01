<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>MiniFb</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.upload{
			background-color: white;
			padding-bottom: 10px;
			padding-left: 10px;
			padding-right: 10px; 
			margin-top: 50px;
			margin-left: 300px;
			width: 700px;
			border-radius: 5px;
		}
		.upload h2{
			margin-left: 250px;
			padding-top: 10px;
		}
		.upload form{
			margin-left: 150px;
		}
		#header ul{
			list-style-type: none;
		}
		.search ul{
			list-style-type: none;
		}
		#header{
			padding-bottom: 20px;
		}
		.dropbtn {
		    background-color: #3498DB;
		    color: white;
		    padding: 8px;
		    font-size: 10px;
		    border: none;
		    cursor: pointer;
		    border-radius: 12px; 
		}
		.dropbtn:hover, .dropbtn:focus {
		    background-color: #2980B9;
		}
		.dropdown {
		    position: relative;
		    display: inline-block;
		}
		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f1f1f1;
		    min-width: 100px;
		    overflow: auto;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}
		.dropdown-content a {
		    color: black;
		    padding: 5px 5px;
		    text-decoration: none;
		    display: block;
		}
		.dropdown a:hover {
			background-color: #ddd;
		}
		.show {
			display:block;
		}
	</style>
</head>
<body onload="refresh(); heading(); ">
	<div id="header" style="background-color: #3333a5;">
		<ul>
			<li>
				<div class="search" style="padding: 10px;">
					<ul style="background-color: #3333a5;">
						<li><img src="logo.png" style="background-color: #3333a5;margin-right: 10px; margin-left: 100px; margin-top: 5px; float: left; width: 40px; height: 38px;" ></li>
						<li style="margin-right: 250px; margin-top: 3px; float: left; background-color: #3333a5;">
							<form action="search.php" method="post">
								<input type="text" name="search" placeholder="search for people" style="padding: 7px; width: 350px;">
							</form>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<div id="navbar" style="float: left;">
					
				</div>
			</li>
			<li>
				<div class="menu" style="float: left;background-color: #3333a5; margin-left: 20px;">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn" style="padding: 8px;">M</button>
  						<div id="myDropdown" class="dropdown-content">
    						<a href="settings.php">Settings</a>
    						<a href="aboutus.php">About</a>
    						<a href="logout.php">Logout</a>
  						</div>
					</div>
				</div>
			</li>		
		</ul>
	</div>
	<div class="main">
			<div class="upload">
				<h2>Upload Photo</h2>
				<form action="imageupload.php" method="post" enctype="multipart/form-data">
				    <input type="file" name="file" id="file">
	    			<input type="submit" value="Upload" name="submit">
				</form>
			</div>
			<div id="posts" style="float: left;">
			
			</div>
			<div id='onlinefriends' style="float: right;">

			</div>
	</div>
</body>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
	   function like(imageid){	
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("likeid").innerHTML = this.responseText; 
		    	}
	  		};
	  		ajaxreq.open("GET","likes.php?id="+imageid,true);
	  		ajaxreq.send();
	   }	
	   function refresh(){		
	  		setTimeout(function(){
	  			$('#posts').load("displayposts.php");
	  			refresh();
	  			},1000);
	   }
	   function heading(){
	   		setTimeout(function(){
	   			$('#navbar').load("header.php");
	   			heading();
	   		},500);
	   }	
	</script>
	<script>
		function myFunction() {
		    document.getElementById("myDropdown").classList.toggle("show");
		}
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
  			}
		}
</script>

</html>