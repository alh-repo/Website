<?php
  if(!isset($_SESSION)){
    session_start();
}
?>

<!--
// Author name:  Adam Hennefer
// Date created: 10.17.19 
// Last updated: 08.29.23
// File name: 	 partners.php
-->
 
<!DOCTYPE html>
<html>

<head>
	<title> MyCSSite-Partners </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, partners">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<header>
		<img src = "images/teamwork.jpg" class = "center1" >
	</header>

	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a class="active" href="partners.php">Partners</a></li>
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
		<p>It might seem obvious but dreams and goals don't just happen.  It takes a team of support.  
		This is a place for me to thank those that helped me reach some of mine.  
		Please double click image for a special message.</p><br>
		<div id="secret" class="center2">
		
			<!--secret text will print here -->
		</div>
		<div >			
			<img src = "images/captainObvious.gif" class ="center2" onclick="secretMessage()">
		</div>
		<script>
			var i = 0;
			var speed = 50;
			var txt = "";
			var xhttp = new XMLHttpRequest();
		
			function typeWriter() {	
				if (i < txt.length) {
						document.getElementById("secret").innerHTML += 
						txt.charAt(i);
						i++;
						setTimeout(typeWriter, speed);
					}
					xhttp.open("POST", "anonymous.txt", true);
					xhttp.send();
					return true;
			};
				
			function secretMessage(){		
				xhttp.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200){
						txt = this.responseText;								
					}	
				};
				typeWriter();
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
		<?php include 'footer.php';?>
	</footer>
</body>

</html>
