
<?php

/**
 * Description du details des produits
 *
 * @author ibrahima
 */
class productsDetails extends dataBase {

    public $id = 0;
    public $name = '';
    public $publicationDate = '';
    public $idProductTypes = '';

    public function __construct() {
        parent::__construct();
    }

// afficher la liste des produits
    public function getProductsDetailsList() {
        $productsList = array();
        $query = 'SELECT `id`, `name`, `publicationDate`, `idProductTypes` FROM `piupiu_productDetails`';
        $productsDetailsResult = $this->db->query($query);
        $productsDetailsList = $productsDetailsResult->fetchAll(PDO::FETCH_OBJ);
        return $productsDetailsList;
    }

// afficher le profil d'un produit

    public function getProductsDetailsById() {
        $query = 'SELECT `id`, `name`, `publicationDate`, `idProductTypes` FROM `piupiu_productDetails` WHERE `id` = :id';
        $productsDetailsResult = $this->db->prepare($query);
        $productsDetailsResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $productsDetailsResult->execute();
        $productsDetailsList = $productsDetailsResult->fetch(PDO::FETCH_OBJ);
        return $productsDetailsList;
    }

// Afficher les informations d'un produit

    public function getProductsDetailsByIdProductDetails() {
        $queryResult = array();
        $query = 'SELECT `id`, `name`, `image`, `publicationDate`, `idProductTypes` FROM `piupiu_productDetails` `idProductDetails` = :idProductDetails';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idProductDetails', $this->idProductDetails, PDO::PARAM_INT);
        if ($queryExecute->execute()) {
            $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
        }

        return $queryResult;
    }

    public function __destruct() {
        
    }

}
