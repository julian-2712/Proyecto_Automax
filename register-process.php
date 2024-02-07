<?php

include './src/helpers.php';
include './connect-mysql.php';

session_start();

// initializing variables
$username = $_POST['username'];
$password = $_POST['password'];
$errors = [];


// REGISTER USER
if (isset($username) && isset($password)) {

  if (checkUser($username, $password)) { // if user exists
    array_push($errors, "Username already exists");
  }

  // Finally, register user if there are no errors in the form
  if (empty($errors)) {
    createUser($username, $password);
    header('location: ./login.php');
  } else {
    $_SESSION['errors'] = $errors;
    header('location: ./register.php');
  }
}
