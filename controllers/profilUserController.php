<?php

//Récupération des détails de l'utilisateurs par l'id qui est passé en GET (paramètre d'URL)
$user = new users();
$user->id = $_GET['id'];
$userDetails = $user->getProfilUserById();

$exploitations = new exploitations();
$exploitations->idUsers = $_GET['id'];
$exploitationsList = $exploitations->getExploitationsByIdUsers();

$haulier = new hauliers();
$haulier->idUsers = $_GET['id'];
$hauliersList = $haulier->getHaulierByIdUsers();

$communes = new communes();
$communesList = $communes->getCommunesList();

$trucks = new trucks();
$trucksList = $trucks->getTrucksListByIdUsers($_GET['id']);




