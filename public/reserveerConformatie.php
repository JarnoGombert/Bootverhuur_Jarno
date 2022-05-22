<?php include '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootverhuur</title>
    <link rel="shortcut icon" href="<?php echo IMAGE_FOLDER; ?>boot.png"/>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <style>
        #resultaten{
            margin: 0 auto;
            width: 1400px;
            text-align: center;
        }
        td{
            width: 300px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- hier include ik de header en de databasefuncties -->
<?php 
include 'header.php';
include '../src/databaseFunctions.php';

if(isset($_POST['reserveer'])){
    // hier pak ik alle info en zet het in de database
    $kiezen = $_POST['kiezen'];
    $persoon = $_POST['persoon'];
    $extra_Opties = $_POST['opties'];
    $dag = $_POST['date'];
    $deeldag = $_POST['dagdeel'];
    $naam = $_POST['naam'];
    $nummer = $_POST['nummer'];
    $mail = $_POST['email'];

    // hier zet ik om van dd-mm-yyyy naar yyyy-mm-dd
    $new_date = date('Y-m-d', strtotime($_POST['date']));

    $query = db_insertData("INSERT INTO bestelling (Welke_Boot, Personen, datum, Name, Nummer, Mail, dagdeel, opties) VALUES ('$kiezen', '$persoon', '$new_date', '$naam', '$nummer', '$mail', '$deeldag', '$extra_Opties')");
} 
?>
    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de Reservering!</h1>
            <table id="bevestiging">
                <tr>
                    <th>Type Boot</th>
                    <th>Aantal Personen</th>
                    <th>Etra Opties</th>
                    <th>Datum</th>
                    <th>Dagdeel</th>
                    <th>Naam</th>
                    <th>Nummer</th>
                    <th>E-mail</th>
                </tr>
                <tr>
                    <td><?php echo $_POST['kiezen']; ?></td>
                    <td><?php echo $_POST['persoon']; ?></td>
                    <td><?php echo $_POST['opties']; ?></td>
                    <td><?php echo $_POST['date']; ?></td>
                    <td><?php echo $_POST['dagdeel']; ?></td>
                    <td><?php echo $_POST['naam']; ?></td>
                    <td><?php echo $_POST['nummer']; ?></td>
                    <td><?php echo $_POST['email']; ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php include 'footer.php';?>
<script scr="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- dit is voor de kleurverschil in de tabel -->
<script src="<?php echo JS_FOLDER; ?>boot.js"></script>
</body>
</html>
