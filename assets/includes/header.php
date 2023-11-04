<?php
session_start();
$_SESSION['account_id'] = 1;
$_SESSION['account_pp'] = 'account.png';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
<head>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
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