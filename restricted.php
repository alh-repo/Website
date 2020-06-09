 <?php
 session_start();
 if (isset($_SESSION['user'])) {
 ?>
 
<!DOCTYPE html>

<!--
// Name: Adam Hennefer
// Date: 12.9.19 
// File: restricted.php
 -->
<html>

<head>
	<title> MyCSSite-Restricted </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, restricted">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<style>
		
	</style>
</head>

<body>
	<header>
		<img src = "images/access_granted.jpg" class = "center1" >
	</header>

	<ul>
		<link rel="stylesheet" href="styles.css">
		<li><a href="home.html">Home</a></li>
		<li><a href="history.html">History</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a class="active" href="restricted.php">Restricted</a></li>
		<li a class="money" style="float:right"><a href="donate.html">Donate</a></li>
		<li style="float:right"><a href="login.php">Login</a></li>
		<li style="float:right"><a href="logout.php">Logout</a></li>
	</ul>
	
	<data>
		<p>MyCSSite Restricted information is coming soon......</p><br>
		<div id="secret" class = "center2">
			<!--secret text will print here -->
		</div>
		
	</data>
   	<footer>
		<p>This website and the information found within was created for educational purposes only.</p>
		<p>Authored by: Adam Hennefer</p>
		<p>Contact information: <a href="mailto:ahennefer3@horizon.csueastbay.edu"> ahennefer3@horizon.csueastbay.edu</a></p>
	</footer>
 <?php

} else {
   ?>
   <h3>Access Denied.  Go back and login.</h3>
   <?php
   header( 'Location: login.php' );
   exit();
}
?>	

</body>

</html>
