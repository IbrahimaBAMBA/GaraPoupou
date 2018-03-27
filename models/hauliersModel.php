<!--Description du model des transporteurs-->
<?php

class hauliers extends dataBase {

    public $id = 0;
    public $name = '';
    public $phoneNumber = '';
    public $idUsers = '';

    public function __construct() {
        parent::__construct();
    }

    public function getHauliersList() {
        $hauliersList = array();
        $query = 'SELECT `id`, `name`, `phoneNumber`, `idUsers` FROM `piupiu_hauliers`';
        $hauliersResult = $this->db->query($query);
        $hauliersList = $hauliersResult->fetchAll(PDO::FETCH_OBJ);
        return $hauliersList;
    }

    public function getHauliersById() {
        $query = 'SELECT `id`, `name`, `phoneNumber`, `idUsers` FROM `piupiu_hauliers` WHERE `id` = :id';
        $hauliersResult = $this->db->prepare($query);
        $hauliersResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $hauliersResult->execute();
        $hauliersList = $hauliersResult->fetch(PDO::FETCH_OBJ);
        return $hauliersList;
    }
     public function getHaulierByIdUsers() {
        $query = 'SELECT `id`, `name`, `phoneNumber` FROM `piupiu_hauliers` WHERE `idUsers` = :idUsers';
        $idUserHaulier = $this->db->prepare($query);
        $idUserHaulier->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $idUserHaulier->execute();
        $idUserHaulierList = $idUserHaulier->fetchAll(PDO::FETCH_OBJ);
        return $idUserHaulierList;
    }

    public function __destruct() {
        
    }

}
