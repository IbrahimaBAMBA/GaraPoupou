<?php

class productTypeModel extends dataBase {
    public $id = 0;
    public $name = '';
    public $idProductCategories = 0;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getlistProductType() {
         $productTypeList = array();
        $query = 'SELECT `id`, `name`, `idProductCategories` FROM `piupiu_productTypes`';
        $productType = $this->db->query($query);
        $productTypeList =  $productType->fetchAll(PDO::FETCH_OBJ);
        return $productTypeList;
    }

        public function __destruct() {
    }
}

