<?php

session_start();

// initializing variables

$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'athena');

//ADMIN
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
    $query = "SELECT * FROM admin WHERE emailid='$email' AND pswd='$password'";
    $results = mysqli_query($db, $query);
    $n=mysqli_num_rows($results);
    echo "$n";
    if ($n == 1) {

    
      $_SESSION['usr_id']=$email;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}