<?php

session_start();

// initializing variables
$name= "";
$username = "";
$email    = "";
$accountno="";
$address="";
$errors = array(); 
$mobile='';
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'athena');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['Brandname']);
  $username = mysqli_real_escape_string($db, $_POST['Username']);

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['MobileNumber']);

  $accountno = mysqli_real_escape_string($db, $_POST['AccountNumber']);
  $address = mysqli_real_escape_string($db, $_POST['Address']);

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Brand name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "mobile no  is required"); }

   if (empty($address)) { array_push($errors, "Company address  is required"); }

    if (empty($accountno)) { array_push($errors, "Bank account no  is required"); }


  if (empty($mobile)) { array_push($errors, "mobile no  is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM brand WHERE phone_no='$mobile' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['phone_no'] === $mobile) {
      array_push($errors, "mobile number exists already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
			
  	$query = "INSERT INTO brand(brand_id,name,owner,pswd,email,account_no,address,phone_no)VALUES
	('','$name','$username','$password','$email','$accountno','$address','$mobile')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['user_id']=$email;
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
  	$query = "SELECT * FROM brand WHERE email='$email' AND pswd='$password'";
  	$results = mysqli_query($db, $query);
    $n=mysqli_num_rows($results);
    echo "$n";
  	if ($n == 1) {

		$name = mysqli_fetch_assoc($results);
		$username=$name['owner'];
    
  	  $_SESSION['username'] = $username;
      $_SESSION['user_id']=$email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}




?>