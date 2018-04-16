<?php

class dataBase {

    //L'attribut $db sera disponible dans ses enfants
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=GaraPoupou;charset=utf8', 'root', 'i271220101127B');
            //Permet d'afficher les erreurs sql
//            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die('Erreur : ' . $ex->getMessage());
        }
    }

    public function __destruct() {
        
    }

}

?>
