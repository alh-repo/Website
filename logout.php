 <?php
 session_start();
 // remove all session variables
 session_unset();

 // destroy the session
 session_destroy();
 ?>

<!--
// Name:  Adam Hennefer
// Date: 12.8.19 
// File: logout.php 
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
		<link rel="stylesheet" href="styles.css">
		<li><a href="home.html">Home</a></li>
		<li><a href="history.html">History</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li a class="money" style="float:right"><a href="donate.html">Donate</a></li>
		<li style="float:right"><a href="login.php">Login</a></li>
		<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
	</ul>

	<data>
		<h3><br>You are logged out.</h3>
		<h3><br>Please come again soon.</h3>
	</data>
	<footer>
		<p>This website and the information found within was created for educational purposes only.</p>
		<p>Authored by: Adam Hennefer</p>
		<p>Contact information: <a href="mailto:ahennefer3@horizon.csueastbay.edu"> ahennefer3@horizon.csueastbay.edu</a></p>
	</footer>
</body>
</html>
