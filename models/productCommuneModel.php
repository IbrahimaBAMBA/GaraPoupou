<?php

/**
 * Description of produitCommuneModel
 * Le model represente la selection d'un produit par departement, par commune et surtout une liste de produits qui existent avec le INNER dans ma jointure
 *
 * @author ibrahima
 */
class productCommune extends dataBase {

    public $id = 0;
    public $nom = '';
    public $price = '';
    public $startDate = '';

    public function __construct() {
        parent::__construct();
    }

    public function getProductByCommune() {
        $productCommuneList = array();
        $query = 'SELECT `prop`.`id` AS `proposalId`, `prod`.`name` AS `productName`, `com`.`name` AS `communeName`, `exp`.`name` AS `exploitationName`, `prod`.`publicationDate` '
                . 'FROM `piupiu_productDetails` AS `prod` '
                . 'INNER JOIN `piupiu_proposals` AS `prop` '
                . 'ON `prop`.`idProductDetails` = `prod`.`id` '
                . 'INNER JOIN `piupiu_exploitations` AS `exp` '
                . 'ON `prop`.`idExploitations` = `exp`.`id` '
                . 'INNER JOIN `piupiu_communes` AS `com` '
                . 'ON `exp`.`idCommunes` = `com`.`id` '
                . 'INNER JOIN `piupiu_departments` AS `dep` '
                . 'ON `com`.`idDepartments` = `dep`.`id` '
                . 'INNER JOIN `piupiu_regionsDistricts` AS `reg` '
                . 'ON `dep`.`idRegions` = `reg`.`id` '
                . 'WHERE `reg`.`id` = :id;';
        $productCommuneResult = $this->db->prepare($query);
        $productCommuneResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($productCommuneResult->execute()) {
            $productCommuneList = $productCommuneResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $productCommuneList;
    }

    public function __destruct() {
        
    }

}
