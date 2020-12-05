 <?php
 session_start();
 // remove all session variables
 session_unset();

 // destroy the session
 session_destroy();
 ?>

<!--
// Author name:  Adam Hennefer
// Date created: 12.8.19 
// Last updated: 12.3.20
// File name: logout.php 
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
		<li><a href="home.html">Home</a></li>
		<li><a href="history.html">History</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="restricted.php">Restricted</a></li>
		<li class="money"><a href="donate.html">Donate</a></li>
		<li class="rightfloat"><a href="login.php">Login</a></li>
		<li class="activeRight"><a href="logout.php">Logout</a></li>
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
		<table style="margin-left:auto;margin-right:auto;">
			<tr>
			<td><a href="https://github.com/alh-repo"><i class="fa fa-github"></i></a></td>
			<td><a href="https://www.linkedin.com/in/adam-hennefer-59577116/"><i class="fa fa-linkedin-square"></i></a></td>			
			<td><a href="mailto:ahennefer3@horizon.csueastbay.edu"><i class="fa fa-envelope"></i></a></td>	
			</tr>
		</table>
		<p>This website and the information found within was created for educational purposes only.</p>
		<p>Authored by: Adam Hennefer</p>
		<p>Contact information: <a href="mailto:ahennefer3@horizon.csueastbay.edu"> ahennefer3@horizon.csueastbay.edu</a></p>
	</footer>
</body>
</html>
