<?php
/**
 * Description of announcements
 *
 * @author ibrahima
 */
class announcements extends dataBase {
   

    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    

    public function __construct() {
        parent::__construct();
    }
    public function addTruck() {
        $query =  'INSERT INTO `piupiu_trucks`(`name`, `volume`, `imageLink`, `idHauliers`, `idCommunes`) '
                . 'VALUES (:name, :volume, :imageLink, :idHauliers, :idCommunes)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':name', $this->name, PDO::PARAM_STR);
        $responseRequest->bindValue(':volume', $this->volume, PDO::PARAM_STR);
        $responseRequest->bindValue(':imageLink', $this->imageLink, PDO::PARAM_STR);
        $responseRequest->bindValue(':idHauliers', $this->idHauliers, PDO::PARAM_INT);
        $responseRequest->bindValue(':idCommunes', $this->idCommunes, PDO::PARAM_INT);     
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }
        
    }
    public function addExploitation() {
      $query = 
        
    }
    public function addProduct() {
        
    }
    public function addhaulier() {
        
    }


    
    public function __destruct() {
        
    }
}
