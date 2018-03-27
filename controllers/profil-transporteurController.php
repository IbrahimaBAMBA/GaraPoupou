<!--Controlleur du profil d'un transporteur-->
<?php

if (isset($_GET['transporteursId'])) {
    $hauliers = new hauliers();
    $hauliers->id = $_GET['transporteursId'];
    $hauliers = $hauliers->getHauliersById();
}