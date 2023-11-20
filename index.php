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
            <h1 class="logo">LELU</h1>
            <form action="login.php" method="post" class="login">
                <input placeholder="Email*" required type="email" name="email"><br><br>

                <div class="password">
                    <input placeholder="Mot de passe*" required type="password" id="loginPassword">
                    <label>
                        <input type="checkbox" id="showPasswordCheckbox" onclick="showPassword()">
                        <span id="checkbox-true">
                            <img class="eyeIcon" src="assets/img/eye-open.svg">
                        </span>
                        <span id="checkbox-false">
                            <img class="eyeIcon" src="assets/img/eye-close.svg">
                        </span>
                    </label>
                </div><br><br>
                <input type="submit" value="Se connecter"><br><br>

                <a href="register.php">S'inscrire</a><br>
                <a href="forgottenPassword.php">Mot de passe oublié ?</a>
            </form>
        </div>
    </main>

    <script>
        function showPassword(){
            const checkbox = document.querySelector('#showPasswordCheckbox')
            const eyeOpen = document.querySelector('#checkbox-true')
            const eyeClose = document.querySelector('#checkbox-false')
            const password = document.querySelector('#loginPassword')

            if (checkbox.checked == true){
                password.type = 'text'
            } else {
                password.type = 'password'
            }
        }
    </script>

<?php } ?>
