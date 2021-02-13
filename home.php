<?php
  if(!isset($_SESSION)){
    session_start();
}
?>

<!--
// Author name:  Adam L. Hennefer
// Date created: 09.25.19 
// Last updated: 02.12.21
// File name: 	 home.php
-->

<!DOCTYPE html>
<html>
<head>
	<title> MyCSSite-Home </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, home">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header> 	
		<img src ="https://cdn-images-1.medium.com/max/1600/1*CaeO7W9pk_4OHG_7nf4-ZA.png " class = "center1">	
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a class="active" href="#home">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
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
	<br>
	<data>
		<p>Welcome to My Computer Science Web Site.  I developed this project  
			while enrolled at California State University East Bay.  
			It exhibits many common website features.  These features are 
			briefly summarize within the accordian presented below.  
		</p>
		<br>
		<p><strong>Website Features - Technical Jargon:</strong></p>
		<button class="accordion">Home Page</button>
		<div class="panel">
			<ol style="list-style-type:disc;">	
			<li>A horizontal navigation bar with links allow the users to traverse the web pages of this site.</li><br>
			<li>The navigation bar should persist at the top of each page when scrolling - Internet Explorer & MS Edge may not support this feature.</li><br>
			<li>A menu burger icon should replace the list items within the navigation bar when the view is reduced for better mobile formatting.</li><br>
			<li>The dynamic navigation bar and the accordian recieve their functionality from JavaScript. </li><br>
		</ol>
		</div>
	
		<button class="accordion">History Page</button>
		<div class="panel">
			<ol style="list-style-type:disc;">
			<li>The History page features a slideshow.</li><br>
			<li>The images are gathered in an HTML container and use a decent amount of CSS to make them fade during transitions.</li><br>
			<li>The functionality to change images comes from JavaScript.</li><br>
			<li>The images were compiled just for demonstation purposes.</li><br>
			</ol>
		</div>

		<button class="accordion">About Page</button>
		<div class="panel">
		  <ol style="list-style-type:disc;">
		  <li>The About page features an embedded video. </li><br>
		  <li>HTML5 allows embeded video based media without the need for a video player plug-in.</li><br>
		  <li>Video files can be directly embedded so long as the video is formatted as an mp4, webm or ogg. </li><br>
		  <li>The HTML5 video element is loaded with various attributes which provide additional JavaScript functionality to manipulate playback and control.</li><br>
		  </ol>	
		</div>
		
		<button class="accordion">Partners Page</button>
		<div class="panel">
		  <ol style="list-style-type:disc;">
		  <li>This page runs a script when the gif is double clicked.</li><br>
		  <li>The script utilizes AJAX (via an XMLHttpRequest object) to access text that is stored in a file.</li><br>
		  <li>The plain text file is then printed to the web page one character at a time to mimic a typewriter.</li><br>
		  <li>The script sends its output text to an innerHTML content dividing element which is empty.</li><br>
		  </ol>	
		</div>
				
		<button class="accordion">Members & Login Pages</button>
		<div class="panel">
		  <ol style="list-style-type:disc;">
		  <li>The Members page & the Restricted page will redirect users to the login page if they are not yet signed in.</li><br>
		  <li>The Login page and new_users_login page use PHP for the server-side scripting.</li><br>
		  <li>The PHP scripts connect to an SQL database to authenticate or create a user account.</li><br>
		  <li>New users recieve email confirmation.  This functionality is provided by reconfiguring the XAMPP sendmail function to work with gmail's SMTP settings. </li><br>
		  <li>Once signed in, a session is created which will then allow access to the restricted pages.</li><br>
		  <li>The Logout page deletes the user session which then removes access to the restricted pages.</li><br>
		  </ol>
		</div>
		
		<button class="accordion">Donate Page</button>
		<div class="panel">
		  <ol style="list-style-type:disc;">
		  <li>The Donate page exhibits a standard billing form.</li><br>
		  <li>Input validation on the client side is provided with HTML5 and JavaScript.  The server side is writen with PHP.</li><br>
		  <li>Valid input is logged into a CSV file titled "log_[date]" and the user is returned a thank you message with the yearly donation sum.</li><br>
		  <li>Invalid input is logged into a CSV file titled "error_log_[date]" and the user is returned an error message.</li><br>
		  <li>To prevent files from growing too large, a new file is created for each new day.</li><br>		
		  <li>Billing and credit card information is periodically deleted and never processed.</li><br>
		  </ol>	
		</div>
		
		<button class="accordion">Web Server</button>
		<div class="panel">
		  <ol style="list-style-type:disc;">
		  <li>I'm using Amazon Web Services Elastic Compute Cloud (i.e. EC2).</li><br>
		  <li>The EC2 instance is hosting a Windows Server 2019 operating system.</li><br>
		  <li>The Windows virtual machine is running an Appache XAMPP open source web server.</li><br>
		  <li>Inbound traffic is allowed for HTTP or HTTPS.</li><br>
		  </ol>	
		</div>
		
		<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
			this.classList.toggle("active2");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
			  panel.style.maxHeight = null;
			} else {
			  panel.style.maxHeight = panel.scrollHeight + "px";
			}ss
		  });
		}
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
	</footer>
</body>
</html>
