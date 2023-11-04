<?php
class userManager extends Manager
{
    public function register($firstname, $lastname, $pseudo, $email, $password, $pp)
    {
        $db = $this->dbConnect();
        $checkIfUserAlreadyExists = $db->prepare('SELECT email FROM users WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($email));

        if ($checkIfUserAlreadyExists->rowCount() == 0){

            $insertUserOnWebsite = $db->prepare('INSERT INTO users(firstName, lastName, pseudo, email, password, pp) VALUES (?, ?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($firstname, $lastname, $pseudo, $email, $password, $pp));

            $getInfosOfThisUserReq = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $getInfosOfThisUserReq->execute(array($email, $password));

            $data = $getInfosOfThisUserReq->fetch();

            return $data;

        } else {

            $errorMsg = 'Cet email est déjà enregistré !';
            $_SESSION['error'] = $errorMsg;
            header('Location: index.php?action=register');
        }
    }

}