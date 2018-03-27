<!--Controlleur de la liste du cours des produits-->
<?php

/**
 * Description of wholeSalePriceListController
 *on instancie son objet
 * 
 * @author ibrahima
 */
$wholeSalePrice = new wholeSalePrice();
$wholeSalePriceList = $wholeSalePrice->getWholeSalePriceList();

