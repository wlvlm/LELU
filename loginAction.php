<?php

require_once('model/manager.php');
require_once('./model/userManager.php');

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);


function login($email, $password){
    $logUser = new userManager();
    $data = $logUser->login($email, $password);
    
    if($data){
        $_SESSION['account_id'] = $data['id'];
        $_SESSION['firstName'] = $data['firstName'];
        $_SESSION['lastName'] = $data['lastName'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['account_pp'] = $data['pp'];
        header('Location: index.php');
        var_dump($data);
    } else {
        header('Location: error.php');
        var_dump($data);
        
    }
}

login($email, $password);