<?php
include './src/helpers.php';
include './connect-mysql.php';
session_start();
$usercookie = 'authsuccesfully';

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username) && !empty($username) && checkUser($username, $password)) {

    setcookie($usercookie, true);

    $user = getUser($username, $password);
    $_SESSION['userId'] = $user['userId'];
    $_SESSION['name'] = $username;

    header('Location: ./index.php');

} else {
    header('Location: ./login.php');
}