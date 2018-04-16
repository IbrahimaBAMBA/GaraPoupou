<?php

/**
 * Description of vegetableProductsListController
 *
 * @author ibrahima
 */

$productsDetails = new productsDetails();
//$productsDetails->id = $_GET['id'];
$productsDetailsList = $productsDetails->getProductsDetailsList();

