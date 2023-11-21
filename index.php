<?php 
include_once('assets/includes/header.php');

if (!isset($_SESSION['account_id'])){
    header('Location: login.php'); 
    } else { ?>

    <main>
        <div class="container">
            <h1>Google Books API</h1>
            <form class="form">
                <label for="search">Votre recherche :</label>
                <input type="text" id="search" class="input">
                <!-- <label for="number">Nombre d'éléments à afficher :</label>
                <input type="number" id="number" class="input-2"> -->
            </form>
            <div class="imgContainer">
            </div>
        </div>
    </main>
              
      <?php } ?>
