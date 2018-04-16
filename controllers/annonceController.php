<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$regName = '#^[A-Z0-9\. ]+$#i';
$regemail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';
$regPassword = '#^([a-zA-Z0-9@*#]{8,15})$#';
$regexDate = '/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/';
$insertSuccess = false;
$formError = array();

$productType = new productTypeModel();
$productTypeList = $productType->getlistProductType();
$communes = new communes();
$communesList = $communes->getCommunesList();

$exploitations = new exploitations();


$trucks = new trucks();
$productsDetails = new productsDetails();

$hauliers = new hauliers();
//????
$hauliers->idUsers = $_SESSION['id'];
$hauliersList = $hauliers->getHaulierByIdUsers();

$exploitations->idUsers = $_SESSION['id'];
$exploitations->getExploitationsList();
$exploitationList = $exploitations->getExploitationsByIdUsers();


if (count($_POST) > 0) {
    if (isset($_POST['categorie']) && $_POST['categorie'] == 'trucks') {
        if (!empty($_POST['nameTruck'])) {
            if (preg_match($regName, $_POST['nameTruck'])) {
                $trucks->name = htmlspecialchars($_POST['nameTruck']);
            } else {
                $formError['nameTruck'] = 'Veuillez renseigner un nom de véhicule valide';
            }
        } else {
            $formError['nameTruck'] = 'Le nom du véhicule n\'est pas renseigné';
        }
        if (!empty($_POST['volume'])) {
            if (preg_match($regName, $_POST['volume'])) {
                $trucks->volume = htmlspecialchars($_POST['volume']);
            } else {
                $formError['volume'] = 'Veuillez renseigner la capacité du véhicule';
            }
        }
//    else {
//        $formError['volume'] = 'Renseignez la capacité de votre véhicule';
//    }

        if (!empty($_POST['idCommunes'])) {
            $trucks->idCommunes = $_POST['idCommunes'];
        } else {
            $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
        }

        //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données

        if (count($formError) == 0) {
            //On fait le lien qu'il y'a entre les deux tables (camion et transporteur) par l'id de haulier.

            $trucks->idHauliers = $_POST['société'];
            if ($trucks->addTruckAnnouncement()) {
                $insertSuccess = true;
                $trucks->name = '';
                $trucks->volume = '';
                $trucks->imageLink = '';
                $trucks->idHauliers = '';
                $trucks->idCommunes = '';
            } else {
                $formError['add'] = 'Le camion n\'a pas pu être créé';
            }
        }
    }

//...
    if (isset($_POST['categorie']) && $_POST['categorie'] == 'exploitations') {
        if (!empty($_POST['nameExploitation'])) {
            if (preg_match($regName, $_POST['nameExploitation'])) {
                $exploitations->name = htmlspecialchars($_POST['nameExploitation']);
            } else {
                $formError['nameExploitation'] = 'Veuillez renseigner un nom d\'exploitations';
            }
        } else {
            $formError['nameExploitation'] = 'Le nom de l\'exploitation n\'est pas renseigné';
        }
        if (!empty($_POST['phoneNumberE'])) {
            if (preg_match($regPhone, $_POST['phoneNumberE'])) {
                $exploitations->phoneNumber = htmlspecialchars($_POST['phoneNumberE']);
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

            if ($exploitations->addExploitationAnnouncement()) {
                $insertSuccess = true;
                $exploitations->name = '';
                $exploitations->phoneNumber = '';
                $exploitations->imageLink = '';
                $exploitations->idUsers = '';
                $exploitations->idCommunes = '';
            } else {
                $formError['add'] = 'L\'exploitation n\'a pas pu être créé';
            }
        }
    }

//...
    if (isset($_POST['categorie']) && $_POST['categorie'] == 'productsDetails') {
        if (!empty($_POST['namePdetails'])) {
            if (preg_match($regName, $_POST['namePdetails'])) {
                $productsDetails->name = htmlspecialchars($_POST['namePdetails']);
            } else {
                $formError['namePdetails'] = 'Veuillez renseigner un nom du produit';
            }
        } else {
            $formError['namePdetails'] = 'Le nom de produit n\'est pas renseigné';
        }


if(!empty($_POST['typeProduit'])){
//    si un produit est selectionné on le recupère
    $productsDetails->idProductTypes = $_POST['typeProduit'];
}else {
    $formError['typeProduit'] = 'Veuillez renseigner un type de produit';
}
        if (!empty($_POST['idCommunes'])) {
            $productsDetails->idCommunes = $_POST['idCommunes'];
        } else {
            $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
        }

        //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
        if (count($formError) == 0) {
            if(!empty($_POST['exploitation'])){
                // Si il y a une exploitation
                $idExploitations = $_POST['exploitation'];
                            if ($productsDetails->addProductExploitation($idExploitations)) {
                $insertSuccess = true;
//                $productsDetails->name = '';
//                $productsDetails->imageLink = '';
//                $productsDetails->publicationDate = '';
//                $productsDetails->idProductTypes = '';
            } else {
                $formError['add'] = 'Le produit n\'a pas pu être créé';
            }
            }else{
            if ($productsDetails->addProductAnnouncement()) {
                $insertSuccess = true;
//                $productsDetails->name = '';
//                $productsDetails->imageLink = '';
//                $productsDetails->publicationDate = '';
//                $productsDetails->idProductTypes = '';
            } else {
                $formError['add'] = 'Le produit n\'a pas pu être créé';
            }
            }
        }
    }

//...
    if (isset($_POST['categorie']) && $_POST['categorie'] == 'hauliers') {
        if (!empty($_POST['nameHaulier'])) {
            if (preg_match($regName, $_POST['nameHaulier'])) {
                $hauliers->name = htmlspecialchars($_POST['nameHaulier']);
            } else {
                $formError['nameHaulier'] = 'Veuillez renseigner le nom de votre entité';
            }
        } else {
            $formError['nameHaulier'] = 'Le nom de votre entité n\'est pas renseigné';
        }
        if (!empty($_POST['phoneNumberH'])) {
            if (preg_match($regPhone, $_POST['phoneNumberH'])) {
                $hauliers->phoneNumber = htmlspecialchars($_POST['phoneNumberH']);
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
            if ($hauliers->addHaulierAnnouncement()) {
                $insertSuccess = true;
                $hauliers->name = '';
                $hauliers->phoneNumber = '';
                $hauliers->idUsers = '';
            } else {
                $formError['add'] = 'Le transporteur n\'a pas pu être créé';
            }
        }
    }

    // Ici on télécharge un fichier image avec toutes les conditions qu'on a defini 
    // On met une condition pour dire que le fichier est bien uploader 
    if (!($_FILES['monImage']['error'] === 4)) {
        //verifie que l'image est bien celui qu'on a choisi et non un faux 

        if (isset($_POST["submit"])) {
            //on definite le chemin relatif du dossierde destination
            //..           
            $target_dir = 'assets/img/img_profilcamion/';
            $target_file = $target_dir . basename($_FILES["monImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["monImage"]["tmp_name"]);
            if ($check !== false) {
                echo "Le fichier est une image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }

            // On verifie si le fichier existe déjà
            if (file_exists($target_file)) {
                echo "Désolé, le fichier existe déjà.";
                $uploadOk = 0;
            }
            // On verifie la taille de l'image
            if ($_FILES["monImage"]["size"] > 500000) {
                echo "Désolé, le fichier est trop volumineux.";
                $uploadOk = 0;
            }
            // On autorise certains formats de fichier
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Désolé, seulement les fichiers JPG, JPEG, PNG & GIF files sont autorisés.";
                $uploadOk = 0;
            }
            // On verifie si $uploadOk est egal à zero en envoyant un message d'erreur
            if ($uploadOk == 0) {
                echo "Désolé, le fichier n'a pas pu être téléchargé.";
                // Si tout est ok , on peut télécharger le fichier
            } else {
                //on rappelle le chemin du dossier à travers $target_file auquel on a attribué le lien dans $target_dir
                if (move_uploaded_file($_FILES["monImage"]["tmp_name"], $target_file)) {
                    echo "Le " . basename($_FILES["monImage"]["name"]) . " a été téléchargé.";
                } else {
                    echo "Désolé, il y'a eu un problème lors du téléchargement.";
                }
            }
            //..      
        }
    }
}

