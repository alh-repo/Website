<?php
/*
 * Author Name:  Adam Hennefer
 * Date create: 11.15.19
 * Last update: 6.29.20
 * File name: calc.php
 * This file processes the donation form.
*/



	// variables from form
	$name = "";
	$addy = "";
	$city_name = "";
	$zip = "";
	$state = "";
	$cardname = "";
	$cardnumber = "";
	$xmonth = "";
	$xyear = "";	
	$cvv = "";
	
	// variable for error message
	$errorMSG = "";
	
	// variables for log files
	$year = date("Y");
	$month = date("F");
	$day = date("j");
	
	// function to test input - security
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	// test name
	if (empty($_POST["fname"])) {
		$errorMSG .= "Name is required ";
	} 
	else if(preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $_POST["fname"])){
		$name = test_input($_POST["fname"]);	
	}
	else {
		$errorMSG .= "Invalid name format ";	
	}

	// test address
	if (empty($_POST["address"])) {
		$errorMSG .= "address is required ";
	} 
	else if (!is_string($_POST["address"])) {
		$errorMSG .= "Invalid address format ";	
	}
	else {
		$addy = test_input($_POST["address"]);
	}

	// check city
	if (empty($_POST["city"])) {
		$errorMSG .= "City is required ";
	} 
	else if (!is_string($_POST["city"])){
		$errorMSG .= "Invalid city format ";
	}
	else {
		$city_name = test_input($_POST["city"]);
	}

	// check zip code
	if (empty($_POST["zip"])) {
		$errorMSG .= "Zip code is required ";
	} 
	else if(!filter_var($_POST["zip"], FILTER_VALIDATE_INT) ||
		strlen((string)$_POST["zip"]) != 5){
			$errorMSG .= "Invalid zip code format ";
	}
	else {
		$zip = test_input($_POST["zip"]);
	}
	
	// fucntion to check state input - input must match a state ID as abreviated
	function validateState($is_state) {
		$states = array("AK","AL","AR","AS","AZ","CA","CO","CT","DC","DE",
			"FL","GA","GU","HI","IA",
			"ID","IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT",
			"NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA","PR","PW","RI",
			"SC","SD","TN","TX","UT","VA","VI","VT","WA","WI","WV","WY");
		$upperState = strtoupper($is_state);
		$statesLength = count($states);	
		if(in_array($upperState, $states)){ return true;}
		else { return false; }
	}
	
	// check state 
	if (empty($_POST["state"])) {
		$errorMSG .= "State is required ";
	} 
	else if(!validateState($_POST["state"])){
		$errorMSG .= "Invalid state code format ";
	}
	else {
		$upperState = strtoupper($_POST["state"]);
		$state = test_input($upperState);
	}

	// check for valid email
	if (empty($_POST["email"])) {
		$errorMSG .= "Email is required ";
	} 
	else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$errorMSG .= "Invalid email format ";
	} 
	else {
		$email = htmlspecialchars($_POST["email"]);	
	}	
		
	// check for valid donation
	if (empty($_POST["donation_amount"])) {
		$errorMSG .= "Amount is required ";
	} 
	else if((!filter_var($_POST["donation_amount"], FILTER_VALIDATE_REGEXP, 
		array("options" => array("regexp"=>"/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/")))) 
		|| $_POST["donation_amount"] < 1) {
		$errorMSG .= "Invalid donation format ";
	}
	else { 
		$result = htmlspecialchars($_POST["donation_amount"]);
	}

	// check card name
	if (empty($_POST["cname"])) {
		$errorMSG .= "Card name is required ";
	} 
	else if(preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $_POST["cname"])){
		$cardname = test_input($_POST["cname"]);	
	}
	else {
		$errorMSG .= "Invalid name format ";	
	} 
	
	// check card number
	if (empty($_POST["ccnum"])) {
		$errorMSG .= "Card number is required ";
	} 
	else if(preg_match('/^([0-9]{13,15})$/', $_POST["ccnum"])){
		$cardnumber = strval(test_input($_POST["ccnum"]));	
	}
	else {
		$errorMSG .= "Invalid card number format ";	
	}
	
	// check expiration month
	if (empty($_POST["expmonth"])) {
		$errorMSG .= "Expiration month is required ";
	} 
	else if(preg_match('/^(0[1-9]|1[0-2]{1})$/', $_POST["expmonth"])){
		$xmonth = test_input($_POST["expmonth"]);	
	}
	else {
		$errorMSG .= "Invalid expiration month format. Please use two digits ";	
	}

	// check expiration year
	if (empty($_POST["expyear"])) {
		$errorMSG .= "Expiration year is required ";
	} 
	else if(preg_match('/^([0-9]{4})$/', $_POST["expyear"])){
		$xyear = test_input($_POST["expyear"]);	
	}
	else {
		$errorMSG .= "Invalid expiration year format. Please use four digits ";	
	}
	
	// check card verification value - cvv
	if (empty($_POST["cvv"])) {
		$errorMSG .= "Card verification value is required ";
	} 
	else if(preg_match('/^([0-9]{3})$/', $_POST["cvv"])){
		$cvv = test_input($_POST["cvv"]);	
	}
	else {
		$errorMSG .= "Invalid CVV format. Please use three digits ";	
	}	


	// if no error message, enter valid log file 
	if(empty($errorMSG)){
		// log donation into files				
		// open the total donations file to get the total amount	
		$fp2 = fopen("donation_total.txt", "a+");
		$total_donations = fgets($fp2);
		// set new_total as current donation plus current total.
		$new_total = floatval($total_donations) + $result;
		// print thank you messages
		echo"<br><br>Thank you for your donation of:  $".number_format($result, 2);
		// load new_total into array it's required for file_puts_contents.
		$new_total_arr = array($new_total);
		echo "<br><br>We appreciate your support ".$name."!";
		// print running total
		echo "<br><br>Total donations this year:  $".number_format($new_total, 2);
		// update the running donation total value in the file
		file_put_contents("donation_total.txt", $new_total_arr);
		// to load file with fputcsv - requires an array.
		$list = array($name, $email, $addy, $city_name, $zip, $state, $result, $cardname, $cardnumber, $xmonth, $xyear, $cvv);
		// log donation date and amount
		$fp = fopen("log_".$year."_".$month."_".$day.".csv", "a");
		fputcsv($fp, $list);
		// close both files
		fclose($fp);
		fclose($fp2);
		//$msg = "Name: ".$name.", Email: ".$email.", Subject: ".$msg_subject.", Message:".$message;
		//$msg = "fname: ".$name;
		//echo json_encode(['code'=>200, 'msg'=>$msg]);
		json_encode(['code'=>200]);
	}
	// else enter error log
	else{
		// set form variables with possible error input 
		$email = htmlspecialchars($_POST["email"]);	
		$result = test_input($_POST["donation_amount"]);
		$name = test_input($_POST["fname"]);
		$addy = test_input($_POST["address"]);
		$city_name = test_input($_POST["city"]);
		$zip = test_input($_POST["zip"]);
		$state = test_input($_POST["state"]);
		$cardname = test_input($_POST["cname"]);
		$cardnumber = test_input($_POST["ccnum"]);
		$xmonth = test_input($_POST["expmonth"]);
		$xyear = test_input($_POST["expyear"]);
		$cvv = test_input($_POST["cvv"]);
		
		// to load file with fputcsv - requires an array.
		$list = array($name, $email, $addy, $city_name, $zip, $state, $result, $cardname, $cardnumber, $xmonth, $xyear, $cvv);
		// log error donation date and amount
		$fp3 = fopen("error_log_".$year."_".$month."_".$day.".csv", "a");
		fputcsv($fp3, $list);
		// close error_log file
		fclose($fp3);
		//echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
		echo json_encode(['msg'=>$errorMSG]);
	}
	
?>
