<?php
include './header.php';
include "./connect-mysql.php";

if (empty($_SESSION['name'])) {
    header('Location: ./login.php');
}

$car = getCar($_GET['carId'], $_SESSION['userId']);


?>


<main>
    <div class="addcarform">
        <h2>Edit your vehicle</h2>
        <form action="update-car.php" method="post" class="formaddcar">

            <input type="hidden" id="carId" name="carId" value="<?php echo $car['id'] ?>" />

            <label for="make">Make:</label>
            <input type="text" value="<?php echo $car['make'] ?>" disabled />

            <label for="model">Model:</label>
            <input type="text" value="<?php echo $car['model'] ?>" disabled />

            <label for="year">Year:</label>
            <input type="text" value="<?php echo $car['year'] ?>" disabled />

            <label for="fuelType">Fuel Type:</label>
            <input type="text" value="<?php echo $car['fuelType'] ?>" disabled />

            <label for="mileage">Mileage (in kms):</label>
            <input type="number" id="mileage" name="mileage" min="0" max="999999" value="<?php echo $car['mileage'] ?>"
                required>

            <label for="power">Power:</label>
            <input type="text" value="<?php echo $car['power'] ?>" disabled />

            <label for="transmission">Transmission:</label>
            <input type="text" value="<?php echo $car['transmission'] ?>" disabled />

            <label for="nctExpiry">NCT Expiry Date:</label>
            <input type="text" value="<?php echo $car['nctExpiry'] ?>" disabled />

            <label for="roadTax">Road Tax:</label>
            <input type="text" value="<?php echo $car['roadTax'] ?>" disabled />

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $car['price'] ?>" required>

            <button type="submit" class="mousepointer">Update</button>
        </form>
    </div>
</main>


<?php
include "footer.php"
    ?>