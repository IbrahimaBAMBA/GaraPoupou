<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$regName = '#^[A-Za-z]+$#';
$regemail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';
$regPassword = '#^([a-zA-Z0-9@*#]{8,15})$#';
$insertSuccess = false;
$formError = array();

$communes = new communes();
$communesList = $communes->getCommunesList();

$trucks = new trucks();

if (count($_POST) > 0) {
    if (!empty($_POST['name'])) {
        if (preg_match($regName, $_POST['name'])) {
            $trucks->name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'Veuillez renseigner un nom de véhicule valide';
        }
    } else {
        $formError['name'] = 'Le nom du véhicule n\'est pas renseigné';
    }
    if (!empty($_POST['volume'])) {
        if (preg_match($regName, $_POST['volume'])) {
            $trucks->volume = htmlspecialchars($_POST['volume']);
        } else {
            $formError['volume'] = 'Veuillez renseigner la capacité du véhicule';
        }
    } else {
        $formError['volume'] = 'Renseignez la capacité de votre véhicule';
    }
    
    if (!empty($_POST['idCommunes'])) {
        $trucks->idCommunes = $_POST['idCommunes'];
    } else {
        $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
    }

    //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
    if (count($formError) == 0) {
        if ($trucks-> addTruckAnnonce()) {
            $insertSuccess = true;
            $trucks->name = '';
            $trucks->volume = '';
            $trucks->imageLink = '';
            $trucks->idHauliers = '';
            $trucks->idCommunes = '';
          
        } else {
            $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
        }
    }
}
$exploitations = new exploitations();

if (count($_POST) > 0) {
  if (!empty($_POST['name'])) {
        if (preg_match($regName, $_POST['name'])) {
            $exploitations->name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'Veuillez renseigner un nom d\'exploitations';
        }
    } else {
        $formError['name'] = 'Le nom de l\'exploitation n\'est pas renseigné';
    }
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regPhone, $_POST['phoneNumber'])) {
            $exploitations->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formError['phoneNumber'] = 'Le numero de téléphone n\'est pas correcte';
        }
    } else {
        $formError['phoneNumber'] = 'Renseignez le numero de téléphone';
    } 
    
    if (!empty($_POST['idCommunes'])) {
        $exploitations->idCommunes = $_POST['idCommunes'];
    } else {
        $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
    }

    //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
    if (count($formError) == 0) {
        if ($exploitations-> addTruckAnnonce()) {
            $insertSuccess = true;
            $exploitations->name = '';
            $exploitations->phoneNumber = '';
            $exploitations->imageLink = '';
            $exploitations->idUsers = '';
            $exploitations->idCommunes = '';
          
        } else {
            $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
        }
    }
}
$productsDetails = new productsDetails();

if (count($_POST) > 0) {
  if (!empty($_POST['name'])) {
        if (preg_match($regName, $_POST['name'])) {
            $productsDetails->name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'Veuillez renseigner un nom du produit';
        }
    } else {
        $formError['name'] = 'Le nom de produit n\'est pas renseigné';
    }
    if (!empty($_POST['publicationDate'])) {
        if (preg_match($regemail, $_POST['publicationDate'])) {
            $productsDetails->publicationDate = htmlspecialchars($_POST['publicationDate']);
        } else {
            $formError['publicationDate'] = 'Veuillez renseigner la date de publication';
        }
    } else {
        $formError['publicationDate'] = 'Renseignez la date de publication';
    }
    
    if (!empty($_POST['idCommunes'])) {
        $productsDetails->idCommunes = $_POST['idCommunes'];
    } else {
        $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
    }

    //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
    if (count($formError) == 0) {
        if ($productsDetails-> addTruckAnnonce()) {
            $insertSuccess = true;
            $productsDetails->name = '';
            $productsDetails->imageLink = '';
            $productsDetails->publicationDate = '';
            $productsDetails->idProductTypes = '';         
        } else {
            $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
        }
    }
}
$hauliers = new hauliers();

if (count($_POST) > 0) {
   if (!empty($_POST['name'])) {
        if (preg_match($regName, $_POST['name'])) {
            $hauliers->name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'Veuillez renseigner le nom de votre entité';
        }
    } else {
        $formError['name'] = 'Le nom de votre entité n\'est pas renseigné';
    }
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regPhone, $_POST['phoneNumber'])) {
            $hauliers->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formError['phoneNumber'] = 'Le numero de téléphone n\'est pas correcte';
        }
    } else {
        $formError['phoneNumber'] = 'Renseignez le numero de téléphone';
    }

    
    if (!empty($_POST['idCommunes'])) {
        $hauliers->idCommunes = $_POST['idCommunes'];
    } else {
        $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
    }

    //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
    if (count($formError) == 0) {
        if ($hauliers-> addTruckAnnonce()) {
            $insertSuccess = true;
            $hauliers->name = '';
            $hauliers->phoneNumber = '';           
            $hauliers->idUsers = '';         
        } else {
            $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
        }
    }
}
