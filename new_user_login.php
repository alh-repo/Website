<?php
  require_once("new_user_logic.php");
?>

<!--
// Name:  Adam Hennefer
// Date Created: 12.8.19
// Last Update: 6.3.20 
// File: new_user_login.php 
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
		<link rel="stylesheet" href="styles.css">
		<li><a href="home.html">Home</a></li>
		<li><a href="history.html">History</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li a class="money" style="float:right"><a href="donate.html">Donate</a></li>
		<li style="float:right"><a class="active" href="login.php">Login</a></li>
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
		id="grade"><?php echo isset($email) ? "Welcome ".$full_name."!" : 'New Users:'; ?>
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
	</data>
	<footer>
		<p>This website and the information found within was created for educational purposes only.</p>
		<p>Authored by: Adam Hennefer</p>
		<p>Contact information: <a href="mailto:ahennefer3@horizon.csueastbay.edu"> ahennefer3@horizon.csueastbay.edu</a></p>
	</footer>
</body>
</html>
