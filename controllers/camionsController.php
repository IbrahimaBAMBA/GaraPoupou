<!--controlleur de la liste des camions-->
<?php

/**
 * Description of trucksListController
 *
 * @author ibrahima
 */
$trucks = new trucks();
$trucksList = $trucks->getTrucksList();
