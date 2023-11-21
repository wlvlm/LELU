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

}