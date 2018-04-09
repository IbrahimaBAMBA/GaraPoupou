
<?php

/**
 * Description du details des produits
 *
 * @author ibrahima
 */
class productsDetails extends dataBase {

    public $id = 0;
    public $name = '';
    public $imageLink = '';
    public $publicationDate = '';
    public $idProductTypes = '';

    public function __construct() {
        parent::__construct();
    }

// afficher la liste des produits
    public function getProductsDetailsList() {
        $productsDetailsList = array();
        $query = 'SELECT `id`, `name`, `publicationDate`, `imageLink`, `idProductTypes` FROM `piupiu_productDetails`';
        $productsDetailsResult = $this->db->query($query);
        $productsDetailsList = $productsDetailsResult->fetchAll(PDO::FETCH_OBJ);
        return $productsDetailsList;
    }

// afficher le profil d'un produit

    public function getProductsDetailsById() {
        $productsDetailsList = array();
        $query = 'SELECT `id`, `name`, `publicationDate`,`imageLink`, `idProductTypes` FROM `piupiu_productDetails` WHERE `id` = :id';
        $productsDetails = $this->db->prepare($query);
        $productsDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        $productsDetails->execute();
        $productsDetailsList = $productsDetails->fetch(PDO::FETCH_OBJ);
        return $productsDetailsList;
    }

// Afficher les informations d'un produit

    public function getProductsDetailsByIdProductDetails() {
        $queryResult = array();
        $query = 'SELECT `id`, `name`, `image`, `publicationDate`, `imageLink`, `idProductTypes` FROM `piupiu_productDetails` `idProductDetails` = :idProductDetails';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idProductDetails', $this->idProductDetails, PDO::PARAM_INT);
        if ($queryExecute->execute()) {
            $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
        }

        return $queryResult;
    }

    //Insérer les informations d'une annonce de produit
    public function addProductAnnonce() {
        $query = 'INSERT INTO `piupiu_productDetails`(`name`, `imageLink`, `publicationDate`, `idProductTypes`) VALUES (:name,:imageLink,:publicatioDate,:idProductTypes)';
        $addProducts = $this->db->prepare($query);
        $addProducts->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addProducts->bindValue(':imageLink', $this->imageLink, PDO::PARAM_STR);
        $addProducts->bindValue(':publicationDate', $this->publicationDate, PDO::PARAM_INT);
        $addProducts->bindValue(':idProductTypes', $this->idProductTypes, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $addProducts->execute();
    }

    public function __destruct() {
        
    }

}
