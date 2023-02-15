<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$mobile='';
$address= "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'athena');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['Username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['MobileNumber']);
  $address = mysqli_real_escape_string($db, $_POST['Address']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "mobile no  is required"); }
  if (empty($address)) { array_push($errors, "address  is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE ccontact='$mobile' OR cemail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['ccontact'] === $mobile) {
      array_push($errors, "mobile number already exists");
    }

    if ($user['cemail'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
			
  	$query = "INSERT INTO customer (c_id,password,cname,cemail,ccontact,caddress)VALUES
	('','$password','$username','$email','$mobile','$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['id']=$email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

//
//
//
////
//
//
////
//
//
// LOGIN USER
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM customer WHERE cemail='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		$name = mysqli_fetch_assoc($results);
		$username=$name['cname'];
    
  	  $_SESSION['username'] = $username;
       $_SESSION['id']=$email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>