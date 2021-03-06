<?php
include '../src/databaseFunctions.php';
include '../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER; ?>style.css">
    <link rel="shortcut icon" href="img/boot.png"/>
    <style>
        label{
        float: left;
        display: block;
        width: 150px;
        }

        input{
            display: block;
            border-radius: 5px;
        }

        input[type="radio"], input[type="checkbox"] {
            display: inline;
        }
        #resultaten{
            margin: 0 auto;
            width: 1400px;
            text-align: center;
        }
        td{
            width: 300px;
            text-align: center;
        }
        #data{
            width: 200px;
            text-align: center;
        }
        .input{
            background-color: rgb(98, 171, 231);
            border-radius: 5px;
            border: 3px solid rgb(67, 133, 187);
            color: white;
        }
    </style>
</head>
<body>
    <!-- hier include ik de header -->
    <?php include 'header.php';
    $user = null;
    if (isset($_POST['login']))
    {
        $user = getUser($_POST['email'], $_POST['wachtwoord']);
        // hier wordt de eigenaar gecheckt of hij toestemming heeft tot alle bestemmingen
        if($user != 'No user found') {
            // en dan wordt hij doorgestuurd naar de resultaten
            header("Location: ./eigenaarResultaat.php");
            exit;
        }
    }
    
    ?>
        <div class="page">
            <div class="home">
                <h1><a style="text-decoration: none; color: black;" href="#">Beheer</a></h1> 
                <h4>Alleen voor bevoegden</h4>
            </div>    
            <div class="Beheer">
                <form action="#" method="POST">
                    <div style="display: flex; justify-content: center; margin-right: 20px">
                        <label for="">E-mail</label>
                        <input name="email" id="input" type="email" required>
                    </div>
                    <div style="padding-top: 5px; display: flex; justify-content: center;">
                        <label for="">Wachtwoord</label>
                        <input name="wachtwoord" class="input" id="Inputt" type="password" required>
                        <input type="checkbox" name="Inputt" onclick="myFunction()">
                    </div>
                    <div style="padding-top: 10px; display: flex; justify-content: center; margin-left: 120px;">
                        <input id="input" name="login" type="submit" value="Login">
                    </div>
                </form>
            </div>
<script>
    // Dit is voor het wachtwoord checken met een checkbox
function myFunction() {
  var x = document.getElementById("Inputt");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}  
</script>
            
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>