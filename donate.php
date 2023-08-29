<?php
  if(!isset($_SESSION)){
    session_start();
}
?>

<!--
// Author name:  Adam Hennefer
// Date created: 11.15.19 
// Last updated: 02.12.21
// File name:    donate.php
-->

<!DOCTYPE html>
<html>

<head>
	<title> MyCSSite-donate </title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Adam Hennefer, MyCSSite, donate">
	<meta name="author" content="Adam Hennefer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles01.css">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.error{
			display: none;
			margin-left: 10px;
		}		

		.error_show{
			color: red;
			margin-left: 10px;
		}
		input.invalid, textarea.invalid{
			border: 2px solid red;
		}

		input.valid, textarea.valid{
			border: 2px solid green;
		}
		
		.up{
			text-transform:uppercase
		}
	</style>
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		
		<!--Name can't be blank-->
		$('#fname').on('input', function() {
			var input=$(this);
			var is_name=input.val();
			if(is_name){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		$('#address').on('input', function() {
			var input=$(this);
			var is_addy=input.val();
			if(is_addy){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		$('#city').on('input', function() {
			var input=$(this);
			var is_addy=input.val();
			if(is_addy){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});


		function validateState(is_state) {
			var states =    ["AK","AL","AR","AS","AZ","CA","CO","CT","DC","DE",
				"FL","GA","GU","HI","IA",
				"ID","IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT",
				"NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA","PR","PW","RI",
				"SC","SD","TN","TX","UT","VA","VI","VT","WA","WI","WV","WY"];
				
			for(var i=0;i< states.length;i++) {
				if(is_state.toUpperCase() == states[i]) {
					return true;
				}
			}
			is_state.value = ""; 
			return false;
		}
				
		$('#state').on('input', function() {
			var input=$(this);
			var is_state = input.val();
			var state = validateState(is_state);
			if(state){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
				
		$('#zip').on('input', function() {
			var input=$(this);
			var data=input.val();
			if($.isNumeric(data)){ var is_zip = data;}
			else { var is_zip = false; }
			if(is_zip){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});	
		
		<!--Donation input can not be blank && not number-->
		<!-- less than zero okay for testing error purpose of assignment -->
		$('#donation_amount').on('input', function() {
			var input = $(this);
			var data = input.val();
			if($.isNumeric(data)){	var is_num=input.val(); }
			else { var is_num=false; }		
			if(is_num){
				input.removeClass("invalid").addClass("valid");
				//n = is_num.toFixed(2); // toFixed() not working...
				$("tl").html(is_num); }
			else{input.removeClass("valid").addClass("invalid");}
			
		});

		<!--Email format testing -->
		$('#email').on('input', function() {
			var input = $(this);
			var re =  /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var is_email = re.test(input.val());
			if(is_email){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		<!--Card Name can't be blank-->
		$('#cname').on('input', function() {
			var input=$(this);
			var is_cname=input.val();
			if(is_cname){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
				
		<!--Credit Card Number can't be blank, must be numeric, & must be 13 to 16 digits-->
		$('#ccnum').on('input', function() {
			var input=$(this);
			var cardno=/^([0-9]{13,16})$/;
			var is_ccnum=cardno.test(input.val());
			if(is_ccnum){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		<!--Expiration month can't be blank, must be numeric, & must be 2 digits -->
		$('#expmonth').on('input', function() {
			var input=$(this); 
			var month=/^(0[1-9]|1[0-2]{1})$/;
			var is_expmonth=month.test(input.val());
			if(is_expmonth){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		<!--Expiration Year can't be blank, must be numeric -->
		$('#expyear').on('input', function() {
			var input=$(this);
			var year=/^([0-9]{4})$/;
			var is_expyear=year.test(input.val());
			var date = new Date();
			var current_year=date.getFullYear();
			if(is_expyear && input.val() >= current_year){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
		
		<!--Card Verification Value can't be blank, must be numeric, and must be three digits-->
		$('#cvv').on('input', function() {
			var input=$(this);
			var cvv=/^([0-9]{3})$/;
			var is_cvv=cvv.test(input.val());
			if(is_cvv){input.removeClass("invalid").addClass("valid");}
			else{input.removeClass("valid").addClass("invalid");}
		});
			
		// Form Submission Validation
		$(".btn").click(function(event){
			var form_data = $("#donation").serializeArray();
			var error_free = true;
			for (var input in form_data){
				var element = $("#"+form_data[input]['name']);
				var valid = element.hasClass("valid");
				//alert("var element: "+"#"+form_data[input]['name']);
				//alert("testing valid: "+valid);
				var error_element = $("span", element.parent());
				if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;  }
				else{error_element.removeClass("error_show").addClass("error");}	
			}
			if (!error_free){
				event.preventDefault(); 
				//alert('prevented Default action');
			}
			else{
				//alert('No errors: Form will be submitted');
				$("form").hide();
				$("button").hide();
				$("#form").hide();
				$.ajax({
					type: "post",
					url: "calc.php",
					data: $("form").serialize(),
					success: function(data) {
						$(".myresult").html(data);
					}
				});		
			}
			
		});
	});

	</script>
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
</head>

<body>
	<header> 
		<img src ="images/donate.gif" class = "center1">	
	</header>
	<!-- Internet Explorer & MS Edge do not support sticky nav bar -->
	<ul>
		<div class="topnav" id="myTopnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="partners.php">Partners</a></li>
		<li><a href="members.php">Members</a></li>
		<li class="activeRight" ><a href="donate.php">Donate</a></li>
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
		<h3>Please make a fake donation. Payment information will not be processed.</h3>
	</data>
 
	 
  <div id = "form" class="row">
  <div id = "form" class="col-75">
    <div class="container">
	  <form id="donation" method="post" action="" >	
      <!--  
        <div class="row">
          <div class="col-50">
		-->  
            <h3>Billing Address:</h3>
        
			<div>
			<label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="Steve Jobs" required></input>
            <span class="error">A name is required</span>
			</div>
			
			<div>
			<label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="example@domain.com" required ></input>
			<span class="error">A valid email address is required</span>
			</div>
            
			<div>
			<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="642 W. 15th Street" required ></input>
			<span class="error">A valid address is required</span>
			</div>
			
			<div>
			<label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="San Ramon" required ></input>
			<span class="error">A valid city is required</span>
			</div>
			
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input class="up" type="text" id="state" name="state" maxlength="2" placeholder="CA" required></input>
				<span class="error">A valid state is required</span>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" maxlength="5" placeholder="94583" required></input>
				<span class="error">A valid zip code is required</span>
              </div>
            </div>
          <!--
		  </div>
		  
          <div class="col-50">
            <h3>Payment</h3>
		  -->
            <h3>Accepted Cards:</h3>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            
			<label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cname" placeholder="Steve Jobs" required></input>
            <span class="error">A card name is required</span>
			
			<label for="ccnum">Credit card number</label>
            <input type="tel" id="ccnum" name="ccnum" minlength="13" maxlength="16" placeholder="4444-3333-2222-1111" required></input>
            <span class="error">A credit card number is required</span>
			
			<label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="01" minlength="2" maxlength="2" required></input>
            <span class="error">A valid two digit expiration month is required</span>
			
			<div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2024" minlength="4" maxlength="4" required></input>
				<span class="error">A valid four digit expiration year is required</span>
              </div>
			  
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="321" minlength="3" maxlength="3" required></input>
				<span class="error">A valid three digit card verification value is required</span>
              </div>
            </div>
    <!--  
		  </div> 
  <div class="col-25">
    <div class="container">
	-->
      <h4>Support MyCSSite<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>
      <div>
	  <label for="cname">Donation Amount</label>
      <input type="text" id="donation_amount" name="donation_amount" placeholder="$0.00" required></input>
	  <span class="error">A valid donation amount is required</span>
      </div>
	  <p>Total <span class="price" style="color:black"><b>$<tl>0.00</tl></b></span></p>
    
	
	</div>	
	</div>
  </div >
  
	<!--	
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
	-->	
      </form>
</body>
	  <div>
	  <button class="btn" id="btn" type="submit">Submit Donation</button>
	  </div>
  	  <div class="myresult">    
	  </div>
	<!--  
    </div>
  </div>
 
</div>
-->

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

</html>



