<?php 
include_once('assets/includes/header.php');


if (isset($_SESSION['account_id'])){    
} else { ?>


<main class="login register">
        <div class="modal">
            <h1 class="logo">LELU</h1>
            <form action="registerAction.php" method="post" class="login">
                <input name="firstName" required placeholder="Prénom*" type="text"><br><br>

                <input name="lastName" required placeholder="Nom*" type="text"><br><br>

                <input name="pseudo" required placeholder="Pseudo*" type="text"><br><br>

                <input placeholder="Email*" required type="email" name="email"><br><br>

                <div class="password">
                    <input placeholder="Mot de passe*" required type="password" id="loginPassword" name="password">
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
                <input type="submit" value="S'inscrire"><br><br>

                <a href="index.php">Se connecter</a><br>
            </form>
        </div>
    </main>

    <?php } ?>

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
    </script>*