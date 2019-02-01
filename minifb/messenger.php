<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Messenger</title>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		header{
			background-color: #3333a5;
			text-align: center;
		}
		header h2{
			padding: 10px;
		}
		button{
			border:none;
		    color: black;
		    width: 200px;
		    padding: 17px;
		    cursor: pointer;
		    background-color: white;
		    padding-bottom:20px; 
		    margin-bottom: 10px;
		    font-size: 0.8em;
		}
		.send{
			margin-left:5px;
			float: bottom;
			display: none;
		}
		.send input[type=text]{
			padding:5px;
			width:70%;
			font-size:1.2em;		
		}
		#presentchat{
			text-align: center;
			font-size: 1.8em;
			height: 40px;
    		border: 1px solid lightgray;
    		box-sizing: border-box;
		}
		#friendslist{
			overflow-y: scroll;
			height: 450px;
			width: 290px;
		}
		#chating{
			width: 700px;
			height: 400px;
			overflow-y: scroll;
		}
		#onlinelist{
			margin-left: 10px;
			overflow-y: scroll; 
			height: 450px;
			width: 280px;
		}
	</style>
</head>
<body onload="unread(); online(); refresh_unread(); refresh_online();">
	<header>
		<h2>Messenger</h2>
	</header>
	<div id="presentchat">	</div>
	<hr>
	<div class="page">	
		<div id="friendslist" style="float: left;">
						
		</div>
		<div id='middle' style="float: left;">
			<div id="chating" style="margin-left: 50px;">
						
			</div>
			<div class="send" id="ses">
				<form onsubmit='send(message.value); unread(); setscroll(); return false;'>
					<input type="text" name="message" id="mess1" placeholder="Message........." required>
				</form>
			</div>
		</div>
		<div id="onlinelist" style="float: left;">
			
		</div>
	</div>
</body>
	<script type="text/javascript">
		var clicker;
		var flag=0;
		var chatname;
		var i = 0;
		function loading(name,clic,name1){
			document.getElementById("chating").style.display = "block";
			document.getElementById("ses").style.display = "block";
			clicker=clic;
			chatname = name1;
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("chating").innerHTML = this.responseText;
		    		  refresh_unread();
		    		  refresh(name);
		    		  refresh_online();
		    	}
		  	};
		  	ajaxreq.open("GET","chat.php?click="+name,true);
		  	ajaxreq.send();
		  	
		}	
		function send(name){
			document.getElementById("mess1").value="";
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function(){
		    	if (this.readyState == 4 && this.status == 200){	
		    		  document.getElementById("show").innerHTML = this.responseText;
		    		  
		    	}
		  	};
		  	ajaxreq.open("GET","send.php?message="+name+"&click="+clicker,true);
		  	ajaxreq.send();
		}	
		function printname(){
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function(){
		    	if (this.readyState == 4 && this.status == 200){	
		    		  document.getElementById("presentchat").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","presentchat.php?click="+chatname,true);
		  	ajaxreq.send();
		}
		function refresh(name){
			if(flag==0){
				flag = 1;
				refresh2(name);
			}
			else{
				flag = 0;
				refresh1(name);
			}
		}
		function refresh1(name){
			if(flag==0){
				setTimeout(function(){
		  			$('#chating').load("chat.php?click="+name);	
		  				refresh1(name);
		  			},200);
			}
			else{
				return false;
			}	
		}
		function refresh2(name){
			if(flag==1){
				setTimeout(function(){
		  			$('#chating').load("chat.php?click="+name);	
		  				refresh2(name);
		  			},200);
			}
			else{
				return false;

			}	
		}
		function unread(){
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("friendslist").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","unread.php",true);
		  	ajaxreq.send();
		}
		function refresh_unread(){
			//alert("hi");
			setTimeout(function(){
		  		$('#friendslist').load("unread.php");
		  		refresh_unread();			
		  	},1000);
		}
		function online(){
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("onlinelist").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","onlinefriends.php",true);
		  	ajaxreq.send();
		}
		function refresh_online(){
			//alert("hi");
			setTimeout(function(){
		  		$('#onlinelist').load("onlinefriends.php");
		  		refresh_online();			
		  	},1000);
		}
		function setscroll(){
			var size = $('#chating').scrollTop() + 100;
		    $('#chating').scrollTop(size+10000000);
		}
	</script>
</html>