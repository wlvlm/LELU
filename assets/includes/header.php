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
    <header>
        <nav>
            <img src="assets/img/LELU_logo.svg" alt="Logo de LELU" class="logo">
            <ul class="nav">
                <li><a href="index.php">Accueil</a></li>    
                <li><a href="catalog.php">Parcourir</a></li>
                <li><a href="community.php">Communauté</a></li>
                <?php if(isset($_SESSION['account_id'])){ ?> 
                <li><a href="acocunt.php">Mon compte</a></li>
                <?php } else { ?>
                <li><a href="login.php">Se connecter</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>