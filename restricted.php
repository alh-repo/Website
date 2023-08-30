 <?php
 session_start();
 if (isset($_SESSION['user'])) {
 ?>
 
<!DOCTYPE html>

<!--
// Author name:  Adam Hennefer
// Date created: 12.09.19 
// Last updated: 08.29.23
// File name:    restricted.php
 -->
<html>

<head>
	<title> MyCSSite-Restricted </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, restricted">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<header>
		<img src = "images/access_granted.jpg" class = "center1" >
	</header>

	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="partners.php">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a class="active" href="restricted.php">Restricted</a></li>
		<li class="money" ><a href="donate.php">Donate</a></li>
		<?php echo isset($_SESSION['user'])  
			? '<li class="rightfloat"><a href="logout.php">Logout</a></li>'  
			: '<li class="rightfloat"><a href="login.php">Login</a></li>' 
		?>
		<a href="javascript:void(0);" class="icon" onclick="navBurger()">
		<i class="fa fa-bars"></i>
		</a>
		</div>
	</ul>
	
	<data>
		<p>MyCSSite Restricted information is coming soon......</p><br>
		<script>
			/* nav bar menu burger */
			/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
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
