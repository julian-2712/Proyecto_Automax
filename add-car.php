<?php
ob_start(); // Start output buffering

include "./header.php";
include "./connect-mysql.php";

if (empty($_SESSION['name'])) {
    header('Location: ./login.php');
    exit;
}

ob_end_flush(); // Flush the output buffer at the end
?>


    <main>
    <div class="addcarform">
        <h2>Add your vehicle</h2>
        <form action="insert-car.php" method="post" class="formaddcar" enctype="multipart/form-data">
            <label for="make">Make:</label>
            <select type="text" id="make" name="make" required>
                <option value="" selected>Select an option</option>
            </select>

            <label for="model">Model:</label>
            <select type="text" id="model" name="model" required disabled>
                <option value="" selected>Select an option</option>
            </select>

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" min="1950" max="2023" required>

            <label for="fuelType">Fuel Type:</label>
            <select type="text" id="fuelType" name="fuelType" required>
                <option value="" selected disabled>Select an option</option>
                <option value="Diesel">Diesel</option>
                <option value="Petrol">Petrol</option>
            </select>
            <label for="mileage">Mileage (in kms):</label>
            <input type="number" id="mileage" name="mileage" min="0" max="999999" required>

            <label for="power">Power:</label>
            <input type="number" id="power" name="power" min="0" required>

            <label for="transmission">Transmission:</label>
            <select id="automatic" name="transmission" required>
                <option value="" selected disabled>Select an option</option>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
            </select>

            <label for="nctExpiry">NCT Expiry Date:</label>
            <input type="month" id="nctExpiry" name="nctExpiry" required>

            <label for="roadTax">Road Tax:</label>
            <input type="number" id="roadTax" name="roadTax" min="0" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" required>

            <label for="image">Select your image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit" class="mousepointer">Submit</button>
        </form>
    </div>
</main>


<?php include "./footer.php" ?>