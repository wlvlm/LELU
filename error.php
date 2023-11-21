<?php
session_start(); ?>

<div class="errorPage">
    <p class="errorMsg"><?=($_SESSION['error'])?></p>
    <a href="register.php">Retourner au formulaire d'inscription</a>
</div>
