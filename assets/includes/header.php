<!-- Le fichier étant un .php, je commence par créer la session de l'utilisateur -->

<?php
session_start();

// Vérification de la version la plus récente de la photo de profil utilisateur
include('checkPp.php');
?>

<!-- J'initialise la lecture du document par les navigateurs en HTML5 avec le DOCTYPE -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
<head>
    <!-- Je configure le script me permettant d'accéder à la base de donnée de Google Books pour récupérer leurs livres -->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <!-- J'encode les caractères afin qu'ils affiches les caractères spéciaux tels que les accents -->
    <meta charset="UTF-8">

    <!-- Je m'occupe de l'optimisation responsive afin que le site prenne toujours la largeur de l'écran sur lequel il est visionné et que son zoom soit de 1x -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- J'ajoute toutes les balises link permmetant de lier les fichiers entre eux afin de récupérer le style, les polices, les couleurs etc... -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/LELU_favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>LELU</title>
</head>
<body>
    <script defer type="module" src="assets/app.js"></script>
    <header>
        <?php if(isset($_SESSION['account_id'])){ ?> 
        <nav>
            <img src="assets/img/LELU_logo.svg" alt="Logo de LELU" class="logo">
            <ul class="nav">
                <li class="mobile index"><a href="index.php"><img src="assets/img/index.svg"></a></li>   

                <li class="mobile catalog"><a href="catalog.php"><img src="assets/img/catalog.svg"></a></li> 

                <li class="mobile community"><a href="community.php"><img src="assets/img/community.svg"></a></li> 

                <li class="mobile"><a href="account.php"><img src="assets/img/<?=$_SESSION['account_pp']?>" class="account"></a></li>                  
            </ul>
        </nav>
        <?php } ?>
    </header>