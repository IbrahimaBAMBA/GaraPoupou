<!--Controlleur du profil d'un camion-->
<?php

$regName = '#^[A-Za-z-0-9\. ]+$#';
$insertSuccess = false;
$formError = array();
//recuperation de l'id de la variable de session qui correspond à l'id de l'utilisateur connecté pour la modification de l'utilisateur
if (isset($_SESSION['id'])) {
    $trucks = new trucks();
    //la variable permet de faire perdurer une info de page en page tout au long de la session
    $trucks->id = $_SESSION['id'];
    $trucksList = $trucks->getTrucksById();



if (isset($_POST['modifyTruckProfil'])) {
 if (!empty($_POST['name'])) {
        //je verifie que les données match avec ma regex 
        if (preg_match($regName, $_POST['name'])) {
            //hydratation, assigner des valeurs aux attributs d'un objet
            $trucks->name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'Renseignez un nom de camion';
        }
    } else {
        $formError['name'] = 'Le nom du camion n\'est pas renseigné';
    }

    if (!empty($_POST['volume'])) {
        if (preg_match($regName, $_POST['volume'])) {
            $trucks->volume = htmlspecialchars($_POST['volume']);
        } else {
            $formError['volume'] = 'La capacité du camion n\'est pas renseignée';
        }
    }
    if (count($formError) == 0) {
//Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
        if ($trucks->modifyTruckProfil()) {
            $insertSuccess = true;
        } else {
            $formError['add'] = 'Erreur lors de la modification du profil du camion.';
        }
    }
    
}

//Suppression du profil camion
if (isset($_POST['deleteTruckProfil'])) {
     $trucks->id = $_SESSION['id'];
    if($trucks->deleteTruckProfil()){
        session_unset();
        session_destroy();
        header('Location: ../camions.php');
        exit;
    }
    
}
}
