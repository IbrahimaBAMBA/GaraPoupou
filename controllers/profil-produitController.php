<!--Controlleur du profil d'un produit vivrier-->
<?php

//if (isset($_GET['id'])) {
    $productsDetails = new productsDetails();
//    $productsDetails->id = $_GET['id'];
    $productsDetailsList = $productsDetails->getProductsDetailsById();
//}