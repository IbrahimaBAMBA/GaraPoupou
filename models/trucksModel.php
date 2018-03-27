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

    public function getTrucksList() {
        $trucksList = array();
        $query = 'SELECT `id`, `name`, `volume`, `idHauliers` FROM `piupiu_trucks`';
        $trucksResult = $this->db->query($query);
        $trucksList = $trucksResult->fetchAll(PDO::FETCH_OBJ);
        return $trucksList;
    }

    public function getTrucksById() {
        $query = 'SELECT `id`, `name`, `volume`, `idHauliers` FROM `piupiu_trucks` WHERE `id` = :id';
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

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

}
