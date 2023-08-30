 <?php
 session_start();
 // remove all session variables
 session_unset();

 // destroy the session
 session_destroy();
 ?>

<!--
// Author name:  Adam Hennefer
// Date created: 12.08.19 
// Last updated: 08.30.23
// File name: 	 logout.php 
-->

<!DOCTYPE html>
<html>
<head>
	<title> MyCSSite-Logout </title>
	<meta charset="UTF-8">
	<meta name="keywords" content=" Adam Hennefer, MyCSSite, logout">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		#error {
		  color: red;	
		}
	</style>
</head>

<body>
	<header> 	
		<img src ="https://i.ytimg.com/vi/XuN_HTM_dBA/maxresdefault.jpg" class = "center1">	
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="partners.php">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li class="money"><a href="donate.php">Donate</a></li>
		<li class="activeRight"><a href="login.php">Login</a></li>
		<a href="javascript:void(0);" class="icon" onclick="navBurger()">
		<i class="fa fa-bars"></i>
		</a>
		</div>
	</ul>

	<data>
		<h3><br>You are logged out.</h3>
		<h3><br>Please come again soon.</h3>
		<script>
			/* nav bar menu burger */
			/* Toggle between adding and removing the "responsive" class to topnav
			when the user clicks on the icon */
			function navBurger() {
			  var x = document.getElementById("myTopnav");
			  if (x.className === "topnav") {
				x.className += " responsive";
			  } else {
				x.className = "topnav";
			  }
			}
		</script>
	</data>
	<footer>
		<?php include 'footer.php';?>
	</footer>
</body>
</html>
