<?php
/*
 * Name:  Adam Hennefer
 * Date create: 11.15.19
 * Last update: 6.29.20
 * File: login_logic.php
 * This file connects to the database and creates a session for existing users. 
*/
  // Read input data
  $debug = false;
  $full_name = isset($_POST['full_name']) 
	? $_POST['full_name'] : '';
  $password = isset($_POST['password'])
	? $_POST['password'] : '';
  $error = null;
  $email = null;
  if ($full_name !== '' && $password !== '') {
	// connect to the database 
	try {
	  $dsn = 'mysql:host=localhost;dbname=cs351_project_db';
	  $username = 'XXXXXXXXXXXXXX';
	  $pwd = 'XXXXXXXXXXXXXXX';
	  $db = new PDO($dsn, $username, $pwd);
	  
	  $query = 
		'SELECT user_name, password, email '.
		'FROM project_users '.
		'WHERE user_name = :name';
	  $statement = $db->prepare($query);
	  $statement->bindValue(':name', $full_name);
	  $statement->execute();
	  $result = $statement->fetch();
	  $statement->closeCursor();
	  if ($result !== null && $result !== false) {
		// crosscheck the password 
		$true_pwd = $result['password'];
		if ($password === $true_pwd) {
		  $email = $result['email'];
		  session_start();
		  
		  $_SESSION['user'] = $full_name;
		} else {
		  $error = 'Incorrect Password';	
		}
	  } else {
		$error = 'User not found';   
	  }
	}
	catch (PDOException $e) {
	  $error = $e->getMessage();	  
	}
	
  }
?>