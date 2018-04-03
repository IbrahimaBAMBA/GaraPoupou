<!--Controlleur du profil d'un camion-->
<?php

if (isset($_GET['id'])) {
    $trucks = new trucks();
    $trucks->id = $_GET['id'];
    $trucks = $trucks->getTrucksById();
}
