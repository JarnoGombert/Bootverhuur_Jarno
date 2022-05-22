<?php 
include '../config/config.php'; 
include '../src/databaseFunctions.php';
$assortiment = db_getData("SELECT * FROM boten");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boot Assortiment</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <link rel="shortcut icon" href="img/boot.png"/>
    <style>
        .infoTekst{
            height: 250px;
            background-color: rgb(67, 133, 187);
        }
        #infoTekst {
            margin-top: 10px;
        }
    </style>
</head>
 <body>
<!--hier include ik de header -->
<?php include 'header.php'; ?>
    <div class="page">
        <div class="bootas">
            <h1><a style="text-decoration: none; color: black;" href="#">Boot assortiment</a></h1> 
            <p>We hebben een rijk assortiment van boten op verschillende locaties.</p>
            <p>bekijk hier alle soorten en maten.</p>
        </div>
        <!-- soorten boten in hun vakjes -->
        <div class="assortiment">
        <?php
        if ($assortiment -> rowCount() > 0)
                {
                    while($boot = $assortiment->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
<!-- hier herhaal ik dit stukje code en pakt hij de heletijd de nieuwe rij waardoor alle boten er komen te staan door dit stukje code -->
                    <div class="vakje">
                        <div id="vakje_info">
                            <img src="<?php echo IMAGE_FOLDER . $boot['bootImage']; ?>" alt="">
                            <h1 style="padding-bottom: 20px;"><?php echo $boot['bootNaam']; ?></h1>
                            <p style="margin-bottom: 30px;" class="buttonVakje"><a href="inlog_verhuur.php" class="reseveren">Huur</a></p>
                        </div>
                        <div id="vakje_tekst">
                            <div id="infoTekst"><h3><?php echo $boot['Info']; ?></h3><span style="font-size: 16px;"><?php echo $boot['tekst']; ?></span></div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>