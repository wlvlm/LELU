<?php 
include_once('assets/includes/header.php');

if (isset($_SESSION['account_id'])){ ?>
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
<?php } else { ?>

    <main class="login">
        <div class="modal">
            <form action="login.php" method="post" class="login">
                <label for="email">Email :</label><br>
                <input type="email" name="email"><br>

                <label for="password">Mot de passe :</label><br>
                <input type="password">
            </form>
        </div>
    </main>

<?php } ?>
