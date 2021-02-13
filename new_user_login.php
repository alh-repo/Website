<?php
  require_once("new_user_logic.php");
?>

<!--
// Author name:  Adam Hennefer
// Date created: 12.08.19
// Last update:  02.12.21 
// File name:    new_user_login.php 
-->

<!DOCTYPE html>
<html>
<head>
	<title> MyCSSite-New User </title>
	<meta charset="UTF-8">
	<meta name="keywords" content=" Adam Hennefer, MyCSSite, sign up, new user, login">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles01.css">
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
		<img src ="images/sign-up-now.png" class = "center1">	
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="partners.php">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li class="money" ><a href="donate.php">Donate</a></li>
		<a href="javascript:void(0);" class="icon" onclick="navBurger()">
		<i class="fa fa-bars"></i>
		</a>
		</div>
	</ul>

	<data>
	<h3>
	<span id="error">
		<?php
		  if (!is_null($error)) {
			$escaped_error = htmlspecialchars($error);
		    echo "<td></td><td>$escaped_error</td>";	  
		  }
		?>
		<br>
	</span>
	<span 
		id="grade"><?php echo isset($email) ? "Welcome ".$full_name."!" : 'Create Account:'; ?>
	</span>
	</h3>
	<div id = "form" class="row">
	<div id = "form" class="col-75">	
	<div class="container">
	<form name="new_user_form" method="post" action="new_user_login.php">
	  <table>
	  <tr>
	    <td><label><i class="fa fa-user"></i> Username: </label></td>
		<td><input type="text" name="full_name" 
		value="<?php echo htmlspecialchars($full_name); ?>"
		required></td>
	  </tr>
	  <tr>
		<td><label><i class="fa fa-lock"></i> Password: </label></td>
		<td><input type="password" name="password" required></td>
	  </tr>
	  <tr>
		<td><label><i class="fa fa-envelope"></i> Email: </label></td>
		<td><input type="email" name="new_email" required></td>
	  </tr>
	<!--
      <tr>
		<td><label><i class="fa fa-address-card-o"></i> Address: </label></td>
		<td><input type="text" name="addy" required></td>
	  <tr>
	-->  
		<td></td><td><input type="submit" name="submit" value="Sign Up"></td>
	  </tr>
	  </table>
	</form>
	</div>
	</div>
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
