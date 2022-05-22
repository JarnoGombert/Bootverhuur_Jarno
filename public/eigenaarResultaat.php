<?php
include 'OOP/serverOOP.php';
include '../src/databaseFunctions.php';
include '../config/config.php';
$opties = db_getData("SELECT * FROM extra_opties");
$soortBoot = db_getData("SELECT * FROM boten");
$dagdeel = db_getData("SELECT * FROM dagdeel");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verhuur</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>edit.css">
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <link rel="shortcut icon" href="img/boot.png"/>
    <style>
        #resultaten{
            margin: 0 auto;
            width: 1400px;
            text-align: center;
        }
        #resultaten table tr td{
            width: 300px;
            text-align: center;
        }
        #knoppen {
            margin: 0 auto;
            width: 350px;
            text-align: center;
            display: flex;
        }
        button{
            padding: 5px 20px;
            margin: 10px 10px;
        }
        #content1{
            text-align: center;
        }
        /* .aanpassen td{
            width: 150px;
            text-align: center;
        }
        .aanpassen #buttons{
            width: 150px;
            text-align: center;
        } */
    </style>
</head>
<body>
    <!-- hier include ik de header -->
    <?php include 'header.php'; ?>
        <div class="page">
            <div class="home">
                <h1><a style="text-decoration: none; color: black;" href="#">Kijk Bestellingen <br> van vandaag</a></h1> 
            </div>
                <div id="resultaten">
                <?php
                    try {
                        $date = date("Y-m-d");
                        $query = db_getData("SELECT * FROM bestelling WHERE datum = '$date'");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);    
                        ?>
                        <table id="bevestiging">
                            <tr>
                                <th>Bestelling ID</th>
                                <th>Type Boot</th>
                                <th>Aantal Personen</th>
                                <th>Etra Opties</th>
                                <th>Datum</th>
                                <th>Dagdeel</th>
                                <th>Naam</th>
                                <th>Nummer</th>
                                <th>E-mail</th>
                            </tr>
                            <?php
                            // hier is een loop in een tr waardoor het mooi wordt neergezet
                                foreach ($result as $data) {
                                ?>
                            <tr>
                                <td><?php echo $data["id"]; ?> </td>
                                <td><?php echo $data["Welke_Boot"]; ?></td>
                                <td><?php echo $data["Personen"]; ?></td>
                                <td><?php echo $data["opties"]; ?></td>
                                <td><?php echo $data["datum"]; ?></td>
                                <td><?php echo $data["dagdeel"]; ?></td>
                                <td><?php echo $data["Name"]; ?></td>
                                <td><?php echo $data["Nummer"]; ?></td>
                                <td><?php echo $data["Mail"]; ?></td>
                            </tr>
                            <?php
                                        }
                                    ?>
                        </table>
                        <?php
                         }
                    catch (PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                    ?> 
                </div>
                <hr>
                <h1 style="text-align: center;">Bestellingen wijzigen?</h1>
            <?php
                $firstName = '';
                $lastName = '';
                $email = '';
                $password = '';

                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $update = true;
                    $user = new User();
                    $user = $user->getUser($id);

                    $firstName = $user->firstName;
                    $lastName = $user->lastName;
                    $email = $user->email;
                    $password = $user->password;
                }
            ?>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>
            <?php
            $db = new mysqli('localhost', 'root', '', 'jarno_b.v.');
            $results = $db->query("SELECT * FROM bestelling");
            ?>
            <div id="content1">
                <table class="aanpassen_resultaat">
                    <thead>
                    <tr class="aanpassen">
                        <th class="td_th">ID</th>
                        <th class="td_th">Welke Boot</th>
                        <th class="td_th">Personen</th>
                        <th class="td_th">Extra opties</th>
                        <th class="td_th">Datum</th>
                        <th class="td_th">Dagdeel</th>
                        <th class="td_th">Naam</th>
                        <th class="td_th">Nummer</th>
                        <th class="td_th">E-mail</th>
                        <th class="td_th" colspan="2">Action</th>
                    </tr>
                    </thead>

                    <?php while ($row = $results->fetch_assoc()) { ?>
                        <tr class="aanpassen">
                            <td class="td_th"><?php echo $row['id']; ?></td>
                            <td class="td_th"><?php echo $row['Welke_Boot']; ?></td>
                            <td class="td_th"><?php echo $row['Personen']; ?></td>
                            <td class="td_th"><?php echo $row['opties']; ?></td>
                            <td class="td_th"><?php echo $row['datum']; ?></td>
                            <td class="td_th"><?php echo $row['dagdeel']; ?></td>
                            <td class="td_th"><?php echo $row['Name']; ?></td>
                            <td class="td_th"><?php echo $row['Nummer']; ?></td>
                            <td class="td_th"><?php echo $row['Mail']; ?></td>
                            <th id="buttons" class="td_th">
                                <a href="eigenaarResultaat.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                                <a href="OOP/serverOOP.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
                <form method="post" action="serverOOP.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="input-group">
                        <label for="">Welke Boot</label>
                        <select name="kiezen">
                            <?php while($boot = $soortBoot->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <option value="<?php echo $boot["bootNaam"];?>"><?php echo $boot["bootNaam"]; ?></option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Personen</label>
                        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
                    </div>
                    <div class="input-group">
                        <label>Extra opties</label>
                        <select name="opties">
                            <?php while($optie = $opties->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <option value="<?php echo $optie["opties"];?>"><?php echo $optie["opties"]; ?></option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Datum</label>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="input-group">
                        <label>Dagdeel</label>
                        <select name="dagdeel">
                            <?php while($dag = $dagdeel->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $dag["dagdeel"];?>"><?php echo $dag["dagdeel"]; ?></option>
                            <?php } ?> 
                        </select>                       
                    </div>
                    <div class="input-group">
                        <label>Naam</label>
                        <input type="text" name="password" value="<?php echo $password; ?>">
                    </div>
                    <div class="input-group">
                        <label>Nummer</label>
                        <input type="text" name="password" value="<?php echo $password; ?>">
                    </div>
                    <div class="input-group">
                        <label>E-mail</label>
                        <input type="email" name="password" value="<?php echo $password; ?>">
                    </div>
                    <div class="input-group">
                        <?php if ($update == true): ?>
                            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                        <?php else: ?>
                            <button class="btn" type="submit" name="save" >Save</button>
                        <?php endif ?>
                    </div>
                </form>
            </div>
       </div>
    <?php include 'footer.php'; ?>

<script scr="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- dit is voor de kleurverschil in de tabel -->
<script src="<?php echo JS_FOLDER; ?>boot.js"></script>
</body>
</html>