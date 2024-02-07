<?php

include './connect-mysql.php';
include './src/helpers.php';

session_start();

deleteCar($_GET['carId'], $_SESSION['userId']);

header('Location: ./listing.php');