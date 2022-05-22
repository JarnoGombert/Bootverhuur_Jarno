<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootverhuur</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo IMAGE_FOLDER; ?>boot.png"/>
    <!-- hier voeg ik een plaatje in bij de tab -->
</head>
<body>
            <!-- <div class="logo">
               <a href="index.php"><img class="img-nav" src="img/boot.png"></a><h3><a style="text-decoration: none; color: black;" href="index.php">Bootverhuur Jarno B.V.</a></h3>
            </div> -->
            <div class="header">
                <div style="display: flex;">
                    <img class="img-nav" src="<?php echo IMAGE_FOLDER; ?>boot.png" alt="Logo">
                    <a href="<?php echo PUBLIC_PATH; ?>index.php" class="logo">Bootverhuur Jarno B.V.</a>
                </div>
                <div class="header-right">
                    <a href="<?php echo PUBLIC_PATH; ?>index.php">Home</a>
                    <a href="<?php echo PUBLIC_PATH; ?>boot_assortiment.php">Boot assortiment</a>
                    <a href="<?php echo PUBLIC_PATH; ?>inlog_verhuur.php">Huur</a>
                    <a href="<?php echo PUBLIC_PATH; ?>contact.php">Contact</a>
                    <a href="<?php echo PUBLIC_PATH; ?>eigenaar.php">Beheer</a>
                </div>
            </div>
    <section class="hero">
        <div class="content">
            <h1>Bootverhuur Jarno B.V.</h1>
            <p>Bekijk en huur hier boten!</p>
        </div>
    </section>
</body>
</html>