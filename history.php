<?php
  if(!isset($_SESSION)){
    session_start();
}
?>

<!--
// Author name:  Adam Hennefer
// Date created: 09.25.19 
// Last updated: 02.12.21
// File name: 	 history.php
-->
 
<!DOCTYPE html>
<html>
<head>
	<title> MyCSSite-History </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="MyCSSite, computer, history">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles.css">
	<style>	
	
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.activate, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
	</style>
</head>

<body>
	<header>
		<img src ="images/history.jpg" class = "center1"> 
	</header>
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a  href="home.php">Home</a></li>
		<li><a class="active" href="#History">History</a></li>
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
	<data>	
		<div>
		<P>A visual history of computers:
		</P>
		</div>
		 <!-- Slideshow container -->
		<div class="slideshow-container">

		  <!-- Images with number and caption text -->
		  <div class="mySlides fade">
			<div class="numbertext">1 / 8</div>
			<img src="images\simpTuringMachine.jpg" style="width:100%">
			<div class="text" style="color:black">Turing Machine Concept 1936</div>
		  </div>
		  
		  <div class="mySlides fade">
			<div class="numbertext">2 / 8</div>
			<img src="images\turing_bombe_rebuild_project.jpg" style="width:100%">
			<div class="text">The Turing Bombe 1940</div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">3 / 8</div>
			<img src="images\ENIAC.jpg" style="width:100%">
			<div class="text">ENIAC 1946</div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">4 / 8</div>
			<img src="images/mainframe.jpg" style="width:100%">
			<div class="text">Early Mainframe Computers 1950's</div>
		  </div>
		  
		  <div class="mySlides fade">
			<div class="numbertext">5 / 8</div>
			<img src="images\mac128.jpg" style="width:100%">
			<div class="text" style="color:black">Macintosh 128 Personal Computer 1984 </div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">6 / 8</div>
			<img src="images\datacenter.jpg" style="width:100%">
			<div class="text">Cloud Computing 1990's</div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">7 / 8</div>
			<img src="images/first_iphone.jpg" style="width:100%">
			<div class="text">Mobile Computing - The iphone 2007</div>
		  </div>
		  
		  <div class="mySlides fade">
			<div class="numbertext">8 / 8</div>
			<img src="images/google_quantum_supremacy.jpg" style="width:100%">
			<div class="text">Quantum Computing - Google announces quantum supremacy 2019 </div>
		  </div>

		  <!-- Next and previous buttons -->
		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<br>

		<!-- The dots/circles -->
		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		  <span class="dot" onclick="currentSlide(4)"></span>
		  <span class="dot" onclick="currentSlide(5)"></span>
		  <span class="dot" onclick="currentSlide(6)"></span>
		  <span class="dot" onclick="currentSlide(7)"></span>
		  <span class="dot" onclick="currentSlide(8)"></span>
		</div>
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			// Next/previous controls
			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			// Thumbnail image controls
			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" activate", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " activate";
			}
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
