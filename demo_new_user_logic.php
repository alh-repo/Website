<?php
/*
 * Name:  Adam Hennefer
 * Date create: 11.15.19
 * Last update: 6.29.20
 * File: new_user_logic.php
 * This file connects to the database and creates new entry for a new user.
 * It also creates a session for the new user and sends an email confirmation.
*/
  // Read input data
  $debug = false;
  $full_name = isset($_POST['full_name']) 
	? $_POST['full_name'] : '';
  $password = isset($_POST['password'])
	? $_POST['password'] : '';
  $email = isset($_POST['new_email'])
	? $_POST['new_email'] : null;
//  $address = isset($_POST['addy'])
//	? $_POST['addy'] : '';	
  $error = null;
//echo("Before if statement");
  if ($full_name !== '' && $password !== '' && $email !=='' /* && $address !== '' */) {
	// connect to the database 
	//echo("After if statement");
	try {
	  $dsn = 'mysql:host=localhost;dbname=cs351_project_db';
	  $username = 'XXXXXXXXXXXXXX';
	  $pwd = 'XXXXXXXXXXXXXXX';
	  $db = new PDO($dsn, $username, $pwd);
	  
	  $query =  
		'INSERT INTO project_users (user_name, password, email )'.
		'VALUES (:name, :pw, :email )';
	  $statement = $db->prepare($query);
	  $statement->bindValue(':name', $full_name);
	  $statement->bindValue(':pw', $password);
	  $statement->bindValue(':email', $email);
//	  $statement->bindValue(':address', $address);
	  $statement->execute();
	  $result = $statement->fetch();
	  $statement->closeCursor();
	  if ($result !== null && $result !== false) {
		// crosscheck the password 
		$error = 'New user NOT added';	
		}
	  else {
		$error = 'New user SUCCESSFULLY created. Please check your email for confirmation.';
		session_start();
		$_SESSION['user'] = $full_name;	
		
		//send email - using xampp sendmail method.	
		$to = $email;
		$subject = "Welcome to MyCSSite.";
		$txt = "Hello ".$full_name." Welcome to MyCSSite. "." Thank you for joining!"."\r\n".
			"Your username is: ".$full_name."\r\n".
			"Your password is: ".$password."\r\n". 
			"- We are still under construction.  So please pardon the dust.";
		$headers = "From: adam.hennefer@gmail.com" . "\r\n" ;
		//"CC: somebodyelse@example.com";
		//echo("$to = ". $email);
		mail($to,$subject,$txt,$headers);		
	  }
	}
	catch (PDOException $e) {
	  $error = $e->getMessage();	  
	}
	//echo("done");
  }
?>