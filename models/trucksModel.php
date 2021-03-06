<!--model camions-->
<?php

/**
 * Description du model des camions
 *
 * @author ibrahima
 */
class trucks extends dataBase {

    public $id = 0;
    public $name = '';
    public $volume = '';
    public $idHauliers = '';
    public $idCommunes = '';
    public $imageLink = '';

    public function __construct() {
        parent::__construct();
    }

    public function getTrucksList() {
        $trucksList = array();
        $query = 'SELECT `id`, `name`, `volume`, `imageLink`, `idCommunes`, `idHauliers` FROM `piupiu_trucks`';
        $trucksResult = $this->db->query($query);
        $trucksList = $trucksResult->fetchAll(PDO::FETCH_OBJ);
        return $trucksList;
    }

//affichage profil camion
    public function getTrucksById() {
        $query = 'SELECT `id`, `name`, `volume`,  `imageLink`, `idCommunes`, `idHauliers` FROM `piupiu_trucks` WHERE `id` = :id';
        $trucksResult = $this->db->prepare($query);
        $trucksResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $trucksResult->execute();
        $trucksList = $trucksResult->fetch(PDO::FETCH_OBJ);
        return $trucksList;
    }

    public function getTrucksListByIdUsers($idUsers) {
        $trucksList = array();
        $query = 'SELECT `t`.`id`, `t`.`name` AS `carBrand`, `t`.`volume`, `t`.`imageLink`, `c`.`name` AS `communeName` '
                . 'FROM `piupiu_trucks` AS `t` '
                . 'INNER JOIN `piupiu_hauliers` AS `h` '
                . 'ON `h`.`id` = `t`.`idHauliers` '
                . 'INNER JOIN `piupiu_communes` AS `c` '
                . 'ON `c`.`id` = `t`.`idCommunes` '
                . 'WHERE `h`.`idUsers` = :idUsers ';
        $trucksResult = $this->db->prepare($query);
        $trucksResult->bindValue(':idUsers', $idUsers, PDO::PARAM_INT);
        $trucksResult->execute();
        $trucksList = $trucksResult->fetchAll(PDO::FETCH_OBJ);
        return $trucksList;
    }

//Insérer une annonce pour un camion
    public function addTruckAnnouncement() {
        $query = 'INSERT INTO `piupiu_trucks`(`name`, `volume`, `imageLink`) VALUES (:name,:volume,:imageLink)';
        $addTrucks = $this->db->prepare($query);
        $addTrucks->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addTrucks->bindValue(':volume', $this->volume, PDO::PARAM_STR);
        $addTrucks->bindValue(':imageLink', $this->imageLink, PDO::PARAM_STR);
        $addTrucks->bindValue(':idHauliers', $this->idHauliers, PDO::PARAM_INT);
        $addTrucks->bindValue(':idCommunes', $this->idCommunes, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTrucks->execute();
    }

//    Pour modifier le profil du camion
    public function modifyTruckProfil() {
        $query = 'UPDATE `piupiu_trucks` '
                . 'SET `name`= :name,`volume`= :volume,`imageLink`= :imageLink,`idHauliers`= :idHauliers,`idCommunes`= :idCommunes '
                . 'WHERE `id` = :id';
        $modifyTruck = $this->db->prepare($query);
        $modifyTruck->bindValue(':name', $this->name, PDO::PARAM_STR);
        $modifyTruck->bindValue(':volume', $this->volume, PDO::PARAM_STR);
        $modifyTruck->bindValue(':imageLink', $this->imageLink, PDO::PARAM_STR);
        $modifyTruck->bindValue(':idHauliers', $this->idHauliers, PDO::PARAM_INT);
        $modifyTruck->bindValue(':idCommunes', $this->idCommunes, PDO::PARAM_INT);
        $modifyTruck->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyTruck->execute();
    }

    //    Pour supprimer le profil d'un camion'
    public function deleteTruckProfil() {
        $deleteTruck =  'DELETE FROM `piupiu_trucks` WHERE `id` = :id';
        $deleteTruck = $this->db->prepare($deleteTruck);
        $deleteTruck->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteTruck->execute();
    }

    public function __destruct() {
        
    }

}
