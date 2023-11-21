<?php 
include_once('assets/includes/header.php');
$url = basename($_SERVER['PHP_SELF']);
$query = $_SERVER['QUERY_STRING'];
if($query){
$url .= "?".$query;
}
$_SESSION['previousPage'] = $url;
?>

<main class="login">
        <div class="modal">
            <h1 class="logo">LELU</h1>
            <form action="loginAction.php" method="post" class="login">
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