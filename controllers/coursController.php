<!--Controlleur de la liste du cours des produits-->
<?php

/**
 * Description of wholeSalePriceListController
 *on instancie son objet
 * 
 * @author ibrahima
 */
//if (isset($_GET['id'])) {
$wholeSalePrice = new wholeSalePrice();
$wholeSalePrice->id = $_GET['id'];
$wholeSalePriceList = $wholeSalePrice->getWholeSalePriceList();
//}


