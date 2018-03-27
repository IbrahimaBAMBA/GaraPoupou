<!--Controlleur du profil d'un camion-->
<?php

if (isset($_GET['camionsId'])) {
    $trucks = new trucks();
    $trucks->id = $_GET['camionsId'];
    $trucks = $trucks->getTrucksById();
}
