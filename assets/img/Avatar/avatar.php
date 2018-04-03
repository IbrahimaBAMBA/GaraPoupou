<?php
class avatar extends dataBase {
    public $pathAvatar = '';
    public $idUser = '';
    
    /*
     * Permet d'inserer une image dans la base de donnée
     */
    public function insertAvatar() {
        $query = 'INSERT INTO `'.self::prefix.'usersAvatar` (`pathAvatar`, `idUser`) VALUES (:pathAvatar, :id)';
        $requestInsertAvatar = $this->db->prepare($query);
        $requestInsertAvatar->bindValue(':pathAvatar', $this->pathAvatar, PDO::PARAM_STR);
        $requestInsertAvatar->bindValue(':id', $this->idUser, PDO::PARAM_INT);
        return $requestInsertAvatar->execute();
    }
    
    /*
     * Permet de récupérer l'avatar d'un utilisateur
     */
    public function getAvatarById() {
        //Avec la requête, on sélectionne les partitions d'un utilisateur en fonction de son id
//        $query = 'SELECT `pathAvatar` FROM `'.self::prefix.'usersAvatar` WHERE `idUser` = :id';
        $query = 'SELECT `'.self::prefix.'usersAvatar`.`pathAvatar` AS `path_Avatar` FROM `'.self::prefix.'usersAvatar` INNER JOIN `'.self::prefix.'Users` ON `'.self::prefix.'usersAvatar`.`idUser` = `'.self::prefix.'Users`.`id` WHERE `idUser` = :id';
        //On prépare la requête
        $avatar = $this->db->prepare($query);
        //On attribut l'id de l'utilisateur à idUser
        $avatar->bindValue(':id', $this->idUser, PDO::PARAM_INT);
        //Si la requête est exécuté
        if($avatar->execute()) {
            //On attribut les résultats de la requête à la variable $partitionList
            $avatarDisplayed = $avatar->fetch(PDO::FETCH_OBJ);
        }
        //On renvoie le résultats
        return $avatarDisplayed;
    }
    
    /* 
     * Permet de supprimer un avatar
     */
    public function deleteAvatarById() {
        $query = 'DELETE FROM `'.self::prefix.'usersAvatar` WHERE `idUser` = :id';
        $partitionDeleteResult = $this->db->prepare($query);
        $partitionDeleteResult->bindValue(':id', $this->idUser, PDO::PARAM_INT);
        return $partitionDeleteResult->execute();
    }
}
?>