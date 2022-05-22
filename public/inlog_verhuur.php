<!-- hier include ik de config en databasefunctions -->
<?php
include '../src/databaseFunctions.php';
include '../config/config.php';

// hier haal ik data uit de database
$dagdeel = db_getData("SELECT * FROM dagdeel");
$soortBoot = db_getData("SELECT * FROM boten");
$opties = db_getData("SELECT * FROM extra_opties")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verhuur</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <link rel="shortcut icon" href="img/boot.png"/>
    <style>
        label{
        float: left;
        display: block;
        width: 150px;
        }

        #input{
            display: block;
            border-radius: 5px;
        }

        input[type="radio"], input[type="checkbox"] {
            display: inline;
        }
    </style>
</head>
<body>
    <!-- hier include ik de header -->
    <?php include 'header.php'; ?>
        <div class="page">
            <div class="home">
                <h1><a style="text-decoration: none; color: black;" href="#">Huur</a></h1> 
                <p>Bekijk wanneer je een boot je wilt huren.</p>
            </div>
            <section class="contact">
                <form align="middle" action="reserveerConformatie.php" method="post">
                    <div class="info">
                        <div>
                            <label for="">Welke Boot</label>
                            <select name="kiezen" id="input">

                            <?php while($boot = $soortBoot->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <option value="<?php echo $boot["bootNaam"];?>"><?php echo $boot["bootNaam"]; ?></option>
                            <?php } ?> 
                            </select>
                        </div>
                        <div>
                            <label for="">Aantal Personen</label>
                            <input name="persoon" id="input" type="number" required>
                        </div>
                        <div>
                            <label for="">Extra Opties</label>
                            <select name="opties" id="input">

                            <?php while($optie = $opties->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <option value="<?php echo $optie["opties"];?>"><?php echo $optie["opties"]; ?></option>
                            <?php } ?> 
                            </select>
                        </div>
                        <div>
                            <label for="">Datum</label>
                            <input type="date" name="date" id="input" required>
                        </div>
                        <div>
                            <label for="">Dagdeel</label>
                            <select name="dagdeel" id="input" type="date">

                            <?php while($dag = $dagdeel->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $dag["dagdeel"];?>"><?php echo $dag["dagdeel"]; ?></option>
                            <?php } ?> 
                            </select>
                        </div>
                        <div>
                            <label for="">Naam</label>
                            <input name="naam" id="input" type="text" required>  
                        </div>
                        <div>
                            <label for="">Nummer</label>
                            <input name="nummer" id="input" type="text" required>    
                        </div>
                        <div>
                            <label for="">E-mail</label>
                            <input name="email" id="input" type="email" required>
                        </div>
                        <div>
                            <input name="reserveer" style="display: inline-block; margin-top: 10px;" type="submit" value="Reserveer">
                        </div>
                    </div>
                </form> 
            </section>
       </div>
    <?php include 'footer.php'; ?>
</body>
</html>