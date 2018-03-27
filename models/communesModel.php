<!-- Description des communes-->
<?php

class communes extends dataBase {
    public $id = 0;
    public $nom = '';
  
    public function __construct() {
        parent::__construct();
    }
     public function getCommunesList() {
        $communesList = array();
        $query = 'SELECT `id`, `name` FROM `piupiu_communes` ORDER BY `name`';
        $communesListResult = $this->db->query($query);
        if (is_object($communesListResult)) {
            $communesList = $communesListResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $communesList;
    }
    
    public function __destruct() {
        
    }

}

