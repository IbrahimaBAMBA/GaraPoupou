<?php

$regName = '#^[A-Za-z]+$#';
$regemail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';
$regPassword = '#^([a-zA-Z0-9@*#]{8,15})$#';
$insertSuccess = false;
$formError = array();
//recuperation de l'id de la variable de session qui correspond à l'id de l'utilisateur connecté pour la modification de l'utilisateur
if (isset($_SESSION['id'])) {
    $users = new users();
    //la variable permet de faire perdurer une info de page en page tout au long de la session
    $users->id = $_SESSION['id'];
    $usersList = $users->getProfilUserById();
}
//on verifie le champ des formulaires

if (isset($_POST['modifyUser'])) {
    //je verifie que mon champ existe et qu'il n'est pas vide
    if (!empty($_POST['lastName'])) {
        //je verifie que les données match ma regex 
        if (preg_match($regName, $_POST['lastName'])) {
            //hydratation, assigner des valeurs aux attributs d'un objet
            $users->lastName = htmlspecialchars($_POST['lastName']);
        } else {
            $formError['lastName'] = 'Le nom n\'est pas correct';
        }
    } else {
        $formError['lastName'] = 'Le nom n\'est pas renseigné';
    }

    if (!empty($_POST['firstName'])) {
        if (preg_match($regName, $_POST['firstName'])) {
            $users->firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $formError['firstName'] = 'Le prénom n\'est pas correct';
        }
    } else {
        $formError['firstName'] = 'Le prénom n\'est pas renseigné';
    }
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regPhone, $_POST['phoneNumber'])) {
            $users->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formError['phoneNumber'] = 'Le numero de téléphone n\'est pas correcte';
        }
    } else {
        $formError['phoneNumber'] = 'Le numero de téléphone n\'est pas renseignée';
    }

    if (!empty($_POST['email'])) {
        if (preg_match($regemail, $_POST['email'])) {
            $users->email = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = 'L\'adresse electronique  n\'est pas correcte';
        }
    } else {
        $formError['email'] = 'L\'adresse electronique  n\'est pas renseignée';
    }
//je verifie que le tableau d'erreur est vide
    if (count($formError) == 0) {
//Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
        if ($users->modifyUser()) {
            $insertSuccess = true;
        } else {
            $formError['add'] = 'Erreur lors de la modification du profil de l\'utilisateur.';
        }
    }
}
//Modification du mot de passe



if (empty($_POST['modifyPassword'])) {
    $formError['modifyPassword'] = 'Le mot de passe  n\'est pas renseigné';
}

//Je verifie que mon champ passwordConfirm existe et n'est pas vide 
if (empty($_POST['passwordConfirm'])) {
    $formError['passwordConfirm'] = 'Veuillez confirmer votre mot de passe!';
}

if (!isset($formError['modifyPassword']) && !isset($formError['passwordConfirm'])) {
//Si password different passwordConfirm j'affiche le message d'erreurs sur le mot de passe
    if ($_POST['modifyPassword'] == $_POST['passwordConfirm']) {
        //sitout est bon,j'efface les espaces de debut et de fin du mot de passe saisi, je le hash pour le securiser et je l'assigne à l'attribut password de mon objet users pour pouvoir l'inserer dans ma base de données.
        $users->password = password_hash(trim($_POST['modifyPassword']), PASSWORD_BCRYPT);
    } else {
        $formError['modifyPassword'] = 'Les mot de passe ne sont pas identiques!';
    }
}
//cette condition permet de lancer la methode modifyPassword lorsque l'on a valider le formulaire et que le tableau d'erreur est vide 
if (count($formError) == 0 && isset($_POST['modifyPasswordValidate'])) {

//Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
    if ($users->modifyPassword()) {
        $insertSuccess = true;
    } else {
        $formError['add'] = 'Erreur lors de la modification du mot de passe de l\'utilisateur.';
    }
}


//Pour afficher la liste des exploitations de l'utilisateur
if (isset($_GET['id'])) {
    $exploitations = new exploitations();
    $exploitations->idUsers = $_GET['id'];
    $exploitationsList = $exploitations->getExploitationsByIdUsers();
}

//Pour afficher la liste des sociétés de transport de l'utilisateur
if (isset($_GET['id'])) {
    $haulier = new hauliers();
    $haulier->idUsers = $_GET['id'];
    $hauliersList = $haulier->getHaulierByIdUsers();
}

//Pour afficher le select des communes
$communes = new communes();
$communesList = $communes->getCommunesList();

//Pour afficher la liste des camions de l'utilisateur
if (isset($_GET['id'])) {
    $trucks = new trucks();
    $trucksList = $trucks->getTrucksListByIdUsers($_GET['id']);
}

//Suppression d'utilisateur

if (isset($_POST['deleteUserProfil'])) {
    $deleteUser = new users();
     $deleteUser->id = $_SESSION['id'];
    $deleteUserList = $deleteUser->deleteUserProfil();
    
}
