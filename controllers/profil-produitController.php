<!--Controlleur du profil d'un produit vivrier-->
<?php

if (isset($_GET['id'])) {
    $product = new productsDetails();
    $product->id = $_GET['id'];
    $product = $product->getProductsDetailsById();
}