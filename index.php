<?php 
include_once('assets/includes/header.php');

if (!isset($_SESSION['account_id'])){
    header('Location: login.php'); 
    } else { ?>

    <main>
        <form class="form">
            <input placeholder="Chercher un livre" type="search" name="search" class="search">
        </form>
        <div class="container">
            <div class="card">
                <div class="leftSide">
                    <h2 class="title" data-title="Titre du livre">Titre du livre</h2>
                    <h4 class="isbn">0123456789101</h4>
                    <h4 class="bookAuthor">Auteur : John Doe</h4>
                    <div class="rating">
                        <p class="average">Moyenne totale :</p>
                        <h2 class="title">4.7</h2>
                        <div class="starContainer">★★★★★</div>
                    </div>
                    <img src="https://i.pinimg.com/236x/37/a9/98/37a99839a447357ee6d3d4b9c991d864.jpg">
                    <div class="imgContainer">
                    </div>
                </div>
                <div class="rightSide"></div>
            </div>
        </div>
    </main>
              
      <?php } ?>
