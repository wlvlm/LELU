<?php

// Vérification de la version la plus récente de la photo de profil utilisateur

require_once('./model/manager.php');
require_once('./model/userManager.php');
function checkUserPp($email){
    $userPp = new userManager();
    $data = $userPp->checkUserPp($email);

    if(!isset($data['pp'])){
        $_SESSION['account_pp'] = 'defaultPp.png';
    } else {
        $_SESSION['account_pp'] = $data['pp'];
    }
}

checkUserPp($_SESSION['email']);