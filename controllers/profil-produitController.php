<!--Controlleur du profil d'un produit vivrier-->
<?php

if (isset($_GET['productId'])) {
    $product = new productsDetails();
    $product->id = $_GET['productId'];
    $product = $product->getProductsDetailsById();
}