<!--Controlleur du profil d'un transporteur-->
<?php

if (isset($_GET['id'])) {
    $hauliers = new hauliers();
    $hauliers->id = $_GET['id'];
    $hauliersList = $hauliers->getHauliersById();
   
}