<?php

require_once('model/manager.php');
require_once('./model/userManager.php');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


function addUser($firstName, $lastName, $pseudo, $email, $password){
    $newUser = new userManager();
    $data = $newUser->register($firstName, $lastName, $pseudo, $email, $password);
    
    if($data){
        $_SESSION['account_id'] = $data['id'];
        $_SESSION['firstName'] = $data['firstName'];
        $_SESSION['lastName'] = $data['lastName'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['email'] = $data['email'];
        header('Location: index.php');
        var_dump($data);
    } else {
        header('Location: error.php');
        var_dump($data);
        
    }
}

addUser($firstName, $lastName, $pseudo, $email, $password);