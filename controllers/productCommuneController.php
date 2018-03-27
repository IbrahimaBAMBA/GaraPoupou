<?php

/**
 * Description of productCommuneController
 *
 * @author ibrahima
 */
$productCommune = new ProductCommune();
$productCommune->id = $_GET['id'];
$productCommuneList = $productCommune->getProductByCommune();


