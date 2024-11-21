<?php

function connection()
{
  $servername = "172.110.0.13";
  $username = "root";
  $password = "root";
  $database = "automax";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function checkUser($username, $password)
{
  $conn = connection();
  $password = mysqli_real_escape_string($conn, md5($password));
  $sql = 'SELECT * FROM users WHERE username="' . $username . '" AND password="' . $password . '"';
  $result = $conn->query($sql);
  return $result->num_rows > 0;
}


function getUser($username, $password)
{
  $conn = connection();
  $hashedPassword = mysqli_real_escape_string($conn, md5($password));
  $sql = 'SELECT * FROM users WHERE username="' . $username . '" AND password="' . $hashedPassword . '"';
  $result = $conn->query($sql);
  $user = $result->fetch_assoc();
  return [
    'userId' => $user['id'],
    'username' => $user['username'],
  ];
}

function getCars()
{
  $sql = 'SELECT * FROM cars ORDER BY insertionTime DESC';
  $conn = connection();
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row using a foreach loop
    return $result;
  } else {
    return [];
  }

}

function createUser($username, $password)
{
  $conn = connection();
  // Sanitize and validate input data
  $username = mysqli_real_escape_string($conn, $username);
  // Hash the password
  $hashedPassword = mysqli_real_escape_string($conn, md5($password));
  $query = "INSERT INTO users (username, password) VALUES('$username', '$hashedPassword')";
  $conn->query($query);
}


function addCar(
  $userId,
  $make,
  $model,
  $year,
  $fuelType,
  $mileage,
  $power,
  $transmission,
  $nctExpiry,
  $roadTax,
  $price,
  $image
): bool {
  $conn = connection();
  
  // Sanitize and validate input data
  $make = mysqli_real_escape_string($conn, $make);
  $model = mysqli_real_escape_string($conn, $model);
  $fuelType = mysqli_real_escape_string($conn, $fuelType);
  $transmission = mysqli_real_escape_string($conn, $transmission);
  
  // Create the image name dynamically
  $imageExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
  $imageName = $make . "_" . $model . "_" .$userId . "." . $imageExtension;
  
  $query = "INSERT INTO cars 
  (userId, make, model, year, fuelType, mileage, power, transmission, nctExpiry, roadTax, price, image) 
  VALUES 
  ($userId, '$make', '$model', '$year', '$fuelType', '$mileage', '$power', '$transmission', '$nctExpiry', '$roadTax', '$price', '$imageName')";
  
  return $conn->query($query); // Returning a boolean value
}


function deleteCar($carId, $userId)
{
  $conn = connection();
  $query = "DELETE FROM cars WHERE id = $carId AND userId = $userId";
  $conn->query($query);
}

function updateCar($carId, $userId, $mileage, $price)
{
  $conn = connection();
  $query = "UPDATE cars SET mileage='$mileage', price='$price' WHERE id = $carId AND userId = $userId";
  $conn->query($query);
}


function getCar($carId, $userId)
{
  $conn = connection();
  $query = "SELECT * FROM cars WHERE id = $carId";
  $result = $conn->query($query);
  return $result->fetch_assoc();
}
