<?php

$uri = $_SERVER['REQUEST_URI'];

$active = match ($uri) {
    '/Project/index.php' => 'index',
    '/Project/listing.php' => 'listing',
    '/Project/add-car.php' => 'add-car',
    '/Project/login.php' => 'login',
    '/Project/register.php' => 'login',
    default => 'index'
};


?>

<nav class="header">
    <a href="index.php" class="logo"><img src="images/automax.png" alt="Automax"/></a>
    <!-- Add the container for the menu icon -->
    <div class="container" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div class="header-right">
        <a <?php echo ($active === 'index') ? 'class="active"' : ''; ?> href="index.php">Home</a>
        <a <?php echo ($active === 'listing') ? 'class="active"' : ''; ?> href="listing.php">Our cars</a>
        <a <?php echo ($active === 'add-car') ? 'class="active"' : ''; ?> href="add-car.php">Sell your car</a>
        <?php if (empty($_SESSION['name'])) { ?>
            <a <?php echo ($active === 'login') ? 'class="active"' : ''; ?> href="login.php">Login</a>
        <?php } else { ?>
            <a href="logout.php">Logout</a>
        <?php } ?>
    </div>
</nav>