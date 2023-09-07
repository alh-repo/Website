<?php
  if(!isset($_SESSION)){
    session_start();
}
?>

<!--
// Author name:  Adam Hennefer
// Date created: 09.25.19 
// Last updated: 09.07.23
// File name: 	 about.php 
-->

<!DOCTYPE html>
<html>

<head>
	<title> MyCSSite-About </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, about">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles.css">
	
</head>

<body>
	<header class="aboutHeader"> 
		<div style="font-weight: bolder; height: 12rem; line-height: 12rem; font-size: 12vh;" >Hello</div>
		<div style="font-size: 3vh" >my name is</div>
		<div style="background-color: white; color: black; font-family: cursive; line-height: 8rem; font-size: 8vh;">Adam</div>
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a class="active" href="about.php">About</a></li>
		<li><a href="partners.php">Partners</a></li>
		<li><a href="members.php">Members</a></li>
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
		<p></p>
		<p>Hello my name is Adam Hennefer.  I recently completed a bachelor's degree in computer science from 
		California State University East Bay.  I am working to further expand my software engineering
		and development skills.   I am motivated by challenges and believe hard work brings good luck.  
		In my free time I like to hang out with my family, play the guitar or write some code. </p>
		<div>
			<video style="display:block; margin: 0 auto;" width="300" controls="controls" id=video>
		<!--	<video width="auto" height="100" class = "center2" controls> -->
				<source src="images/hello_adam.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			
		</div>
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
</body>
</html>