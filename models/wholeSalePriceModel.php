
<?php

/**
 * Description du cours des produitssur le marché
 *
 * @author ibrahima
 */
class wholeSalePrice extends dataBase {

    public $id = 0;
    public $price = '';
    public $startDate = '';
    public $idProductDetails = '';
    public $idCommunes = '';

    public function __construct() {
        parent::__construct();
    }

    public function getWholeSalePriceList() {
        $wholeSalePriceList = array();
        $query = 'SELECT com.`name` AS `communeName`, wspri.`price` AS `sellPrice` , wspri.`startDate` AS `sellStartTime`, prod.`name` AS `productName` '
                . 'FROM  `piupiu_departments` AS dep '
                . 'LEFT JOIN `piupiu_communes` AS com ON dep.`id` = com.`idDepartments` '
                . 'INNER JOIN `piupiu_wholesalePrices` AS wspri ON wspri.`idCommunes` = com.`id` '
                . 'LEFT JOIN `piupiu_productDetails` AS prod ON wspri.`id` = prod.`idWholeSalePrice` '
                . 'WHERE wspri.id = 1';
        $wholeSalePrice = $this->db->prepare($query);
        $wholeSalePrice->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($wholeSalePrice->execute()) {
            $wholeSalePriceList = $wholeSalePrice->fetchAll(PDO::FETCH_OBJ);
        }
        return $wholeSalePriceList;
    }

    public function __destruct() {
        
    }

}
  $hauliersResult->execute();
        $hauliersList = $hauliersResult->fetch(PDO::FETCH_OBJ);
        return $hauliersList;