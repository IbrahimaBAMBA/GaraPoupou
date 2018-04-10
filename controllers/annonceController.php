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
        if ($trucks->addTruckAnnonce()) {
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

    $exploitations = new exploitations();

//if (count($_POST) > 0) {
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
        if ($exploitations->addTruckAnnonce()) {
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
//}
    $productsDetails = new productsDetails();

//if (count($_POST) > 0) {
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
        if ($productsDetails->addTruckAnnonce()) {
            $insertSuccess = true;
            $productsDetails->name = '';
            $productsDetails->imageLink = '';
            $productsDetails->publicationDate = '';
            $productsDetails->idProductTypes = '';
        } else {
            $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
        }
    }
//}
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
            if ($hauliers->addTruckAnnonce()) {
                $insertSuccess = true;
                $hauliers->name = '';
                $hauliers->phoneNumber = '';
                $hauliers->idUsers = '';
            } else {
                $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
            }
        }
    }
if(!($_FILES['monImage']['error'] === 4)){
    //verifie que l'image est bien celui qu'on a choisi et non un faux 
    
    if (isset($_POST["submit"])) {
        //on definite le chemin relatif du dossierde destination
        $target_dir = 'assets/img/img_profilcamion/';
        $target_file = $target_dir . basename($_FILES["monImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["monImage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["monImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            //on rappelle le chemin du dossier à travers $target_file auquel on a attribué le lien dans $target_dir
            if (move_uploaded_file($_FILES["monImage"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["monImage"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
}

