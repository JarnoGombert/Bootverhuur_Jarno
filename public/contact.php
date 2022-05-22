<?php include '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
        <div class="page">
            <div class="home">
                <h1><a style="text-decoration: none; color: black;" href="#">Contact</a></h1> 
                <section class="mail-contact">
                    <div class="mail">
                        <h3>Als je een vraag hebt of een afspraak wilt maken? Druk op je keuze en verstuur je mail.</title>
                        <div>
                            <!-- dit is een stukje code die mailto heet waardoor als je er op drukt je word doorgestuurd naar de mail -->
                            <p><a href="mailto:jarnogombert@gmail.com?subject=Vraag Voor Jarno B.V.">Vraag?</a></p> 
                            <p><a href="mailto:jarnogombert@gmail.com?subject=Afspraak bij Jarno B.V.">Afspraak?</a></p>  
                        </div>
                    </div> 
        </section>
            </div>
        </div>
          
    <?php include 'footer.php'; ?>
</body>
</html>