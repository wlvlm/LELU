<?php
class userManager extends Manager
{
    public function register($firstname, $lastname, $pseudo, $email, $password)
    {
        $db = $this->dbConnect();
        $checkIfUserAlreadyExists = $db->prepare('SELECT email FROM users WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($email));

        if ($checkIfUserAlreadyExists->rowCount() == 0){

            $insertUserOnWebsite = $db->prepare('INSERT INTO users(firstName, lastName, pseudo, email, password) VALUES (?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($firstname, $lastname, $pseudo, $email, $password));

            $getInfosOfThisUserReq = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $getInfosOfThisUserReq->execute(array($email, $password));

            $data = $getInfosOfThisUserReq->fetch();

            return $data;

        } else {

            $_SESSION['error'] = 'Cet email est déjà enregistré !';
            header('Location: error.php');
        }
    }

    public function login($email, $password) 
    {
        $db = $this->dbConnect();
        $checkIfUserExists = $db->prepare('SELECT * FROM users WHERE email = ?');
        $checkIfUserExists->execute(array($email));

        if ($checkIfUserExists->rowCount() > 0) {

            $userData = $checkIfUserExists->fetch();
            if(password_verify($password, $userData['password'])){
                return $userData;
            } else {
                $errorMsg = 'Le mot de passe saisi est invalide !';
                $_SESSION['email'] = $email;
                $_SESSION['error'] = $errorMsg;
                header('Location: error.php');   
            }

        } else {
            
            $errorMsg = 'L\'adresse email ou le mot de passe est invalide !';
            $_SESSION['error'] = $errorMsg;
            header('Location: error.php');      

        }
    }

}