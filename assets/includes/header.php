<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/LELU_favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <title>LELU</title>
</head>
<body>
    <script defer type="module" src="assets/app.js"></script>
    <header>
        <nav>
            <img src="assets/img/LELU_logo.svg" alt="Logo de LELU" class="logo">
            <ul class="nav">
                <li class="desktop"><a href="index.php">Accueil</a></li>
                <li class="mobile"><a href="index.php"><img src="assets/img/"></a></li>   

                <li class="desktop"><a href="catalog.php">Parcourir</a></li>
                <li class="mobile"><a href="catalog.php"><img src="assets/img/"></a></li> 

                <li class="desktop"><a href="community.php">Communauté</a></li>
                <li class="mobile"><a href="community.php"><img src="assets/img/"></a></li> 

                <?php if(isset($_SESSION['account_id'])){ ?> 
                <li class="desktop"><a href="account.php">Mon compte</a></li>
                <li class="mobile"><a href="account.php"></a></li>  

                <?php } else { ?>
                <li class="desktop"><a href="login.php">Se connecter</a></li>
                <li class="mobile"><a href="login.php"><img src="assets/img/"></a></li> 
                   
                <?php } ?>
            </ul>
        </nav>
    </header>