<?php
  require_once("login_logic.php");
?>

<!--
// Author name:  Adam Hennefer
// Date created: 12.8.19
// Last updated: 12.3.20 
// File name: login.php 
-->

<!DOCTYPE html>
<html>
<head>
	<title> MyCSSite-Login </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, login, sign up">
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
		th, td {
		  padding: 15px;
		}
	</style>
</head>

<body>
	<header> 	
		<img src ="https://media.wired.com/photos/593320d858b0d64bb35d4655/master/w_3645,c_limit/163727876.jpg" class = "center1">	
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.html">Home</a></li>
		<li><a href="History.html">History</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="restricted.php">Restricted</a></li>
		<li class="money"><a href="donate.html">Donate</a></li>
		<li class="rightfloat" ><a href="logout.php">Logout</a></li>
		<li class="activeRight"><a href="login.php">Login</a></li>
		<a href="javascript:void(0);" class="icon" onclick="navBurger()">
		<i class="fa fa-bars"></i>
		</a>
		</div>
	</ul>
	<data>
		<h3><br><span id="grade">
			<?php echo isset($email) ? "Welcome ".$full_name." You are logged in." : 'You must
			login or sign up to access the Members page and the Restricted page content.'; ?>
		</span><br></h3>
		<h3><br>New Users:</h3>

	<div id = "form" class="row">
	<div id = "form" class="col-75">	
	<div class="container">
		<form>
		<table>
		  <tr>
			<td><label><i class="fa fa-user-plus"></i> Sign Up</label></td><td></td><td>
				<button type="button" class=btn style="background-color:white" onclick="window.location.href='new_user_login.php'">Create Account</button></td>
		  </tr> 
		</table>
		</form>
	</div>
	</div>
	</div>		
	
	<h3><br>Existing Users:</h3>
	<div id = "form" class="row">
	<div id = "form" class="col-75">	
	<div class="container">
	<form name="exam_submit_form" method="post" action="login.php">
	  <table>
	  <tr>
	    <td><label for="fname"><i class="fa fa-user"></i> Username</label></td>
		<td><input type="text" id="fname" name="full_name" 
		value="<?php echo htmlspecialchars($full_name); ?>"
		required></td>
	  </tr>
	  <tr>
		<td><label><i class="fa fa-lock"></i> Password</label></td>
		<td><input type="password" name="password" required></td>
	  </tr>
	
	  <tr id="error">
		<?php
		  if (!is_null($error)) {
			$escaped_error = htmlspecialchars($error);
		    echo "<td></td><td>$escaped_error</td>";	  
		  }
		?>
	  </tr>
	  <tr>
		<td></td><td><input type="submit" name="submit" class=btn value="Submit" style="background-color:white"></td>
	  </tr>
	  </table>
	</form>
	</div>
	</div>
	</div>
	<?php
	  if ($debug) {
		echo "FullName = $full_name, Password = $password";
	  }	  
	?>
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
