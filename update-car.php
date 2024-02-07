<?php

include './connect-mysql.php';
include './src/helpers.php';

session_start();

updateCar($_POST['carId'], $_SESSION['userId'], $_POST['mileage'], $_POST['price']);

header('Location: ./listing.php');