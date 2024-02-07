<?php

include "./header.php";
include './connect-mysql.php';

$cars = getCars();

?>

<main class="list-cars">
    <ul class="non-style">
        <?php
        if (!empty($cars)) {
            foreach ($cars as $car) {

                ?>
                <li>
                    <div class="design">
                        <div class="car-image">
                            <img src="uploads/<?php echo $car['image']; ?>"
                                alt="<?php echo $car['make'] . ' ' . $car['model']; ?>" height="400" width="600">
                        </div>
                        <div class="car-details">
                            <div class="car-make">
                                <p>
                                    <?php echo $car['make'] . " " . $car['model']; ?>
                                </p>
                            </div>
                            <div>
                                <ul class="list-columns">
                                    <li>
                                        <b>Year: </b>
                                        <?php echo $car['year']; ?>
                                    </li>
                                    <li>
                                        <b>Fuel type: </b>
                                        <?php echo $car['fuelType']; ?>
                                    </li>
                                    <li>
                                        <b>Mileage: </b>
                                        <?php echo $car['mileage']; ?> KM
                                    </li>
                                    <li>
                                        <b>Power: </b>
                                        <?php echo $car['power']; ?> HP
                                    </li>
                                    <li>
                                        <b>Transmission: </b>
                                        <?php echo $car['transmission']; ?>
                                    </li>
                                    <li>
                                        <b>Valid NCT: </b>
                                        <?php echo $car['nctExpiry']; ?>
                                    </li>
                                    <li>
                                        <b>Road tax: </b>€
                                        <?php echo $car['roadTax']; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="car-price">
                                <p>Price €
                                    <?php echo $car['price']; ?>
                                </p>
                                <p>
                                    <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] === $car['userId']) { ?>
                                        <button onclick="updateConfirm(<?php echo $car['id']; ?>)"><span
                                                class="small-links mousepointer">Edit your ad</span></button>
                                        <button onclick="deleteConfirm(<?php echo $car['id']; ?>)"><span
                                                class="small-links mousepointer">Delete</span></button>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php }
        } ?>
    </ul>
</main>

<?php include "./footer.php" ?>