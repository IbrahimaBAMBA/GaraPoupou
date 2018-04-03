
<?php

class users extends dataBase {

    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $email = '';
    public $phoneNumber = '';
    public $password = '';
    public $activityDescription = '';
    public $idCommunes = '';

    public function __construct() {
        parent::__construct();
    }

    public function addUsers() {
        $query = 'INSERT INTO `piupiu_users` (`lastName`, `firstName`, `phoneNumber`, `email`, `password`, `idCommunes`) VALUES (:lastName, :firstName, :phoneNumber, :email, :password, :idCommunes)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $responseRequest->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $responseRequest->bindValue(':phoneNumber', $this->email, PDO::PARAM_INT);
        $responseRequest->bindValue(':email', $this->email, PDO::PARAM_STR);
        $responseRequest->bindValue(':password', $this->password, PDO::PARAM_STR);
        $responseRequest->bindValue(':idCommunes', $this->idCommunes, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    /*
     * Je crée une première methode (checkConnexionsPassword) pour recuperer le mot de passe pour pouvoir faire ma verification de mot de passe
     * Ensuite je crée une deuxieme méthode (checkConnexionsInformations) pour recuperer le reste des infos dont j'ai besoin sans les deux premières valeurs que j'ai déjà recuperer.
     */

    //Je crée une méthode pour recuperer le mot de passe par le mail
    public function getPasswordByEmail() {
        $query = 'SELECT `password` FROM `piupiu_users` WHERE `email` = :email';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':email', $this->email, PDO::PARAM_STR);
        if ($responseRequest->execute()) {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        } else {
            $resultRequest = 'Il y a eu une erreur, merci de contacter l\'administrateur du site';
        }
        return $resultRequest;
    }

//Je crée une deuxième méthode ou je selectionne toutes les info de l'utilisateur là ou le mail est le même que celui qui a été tapé
    public function getUserByEmail() {
        $query = 'SELECT `id`, `lastName`, `firstName`, `idCommunes` FROM `piupiu_users` WHERE `email`= :email';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':email', $this->email, PDO::PARAM_STR);
        if ($responseRequest->execute()) {
            $resultRequest = $responseRequest->fetch(PDO::FETCH_OBJ);
        } else {
            $resultRequest = 'Il y a eu une erreur, merci de contacter l\'administrateur du site';
        }
        return $resultRequest;
    }

    public function getProfilUserById() {
        $profilUserList = array();
        $query = 'SELECT `piupiu_users`.`lastName`, `piupiu_users`.`firstName`, `piupiu_users`.`phoneNumber`, `piupiu_users`.`email` '
                . 'FROM `piupiu_users` '
                . 'WHERE `piupiu_users`.`id` = :id';
        $profilUser = $this->db->prepare($query);
        $profilUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($profilUser->execute()) {
            $profilUserList = $profilUser->fetch(PDO::FETCH_OBJ);
        }
        return $profilUserList;
    }

    public function modifyUser() {
        $query = 'UPDATE `piupiu_users` SET `lastName`= :lastName,`firstName`= :firstName,`phoneNumber`= :phoneNumber,`email`= :email WHERE id = :id';
        $user = $this->db->prepare($query);
        $user->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $user->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $user->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $user->bindValue(':email', $this->email, PDO::PARAM_STR);
        $user->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $user->execute();
    }
    public function deleteUserProfil(){
        $queryUser = 'DELETE FROM `piupiu_users` WHERE `id` = :id';
        $deleteUser = $this->db->prepare($queryUser);
                $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
                $deleteUser->execute();
    }

    public function modifyPassword() {
        $query = 'UPDATE `piupiu_users` SET `password`= :password WHERE `id` = :id';
        $user = $this->db->prepare($query);
        $user->bindValue(':password', $this->password, PDO::PARAM_STR);
        $user->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $user->execute();
    }

    public function __destruct() {
        
    }

}
