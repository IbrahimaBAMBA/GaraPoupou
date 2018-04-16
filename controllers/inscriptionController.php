<!--Controller de l'inscription-->
<?php
$regName = '#^[A-Za-z]+$#';
$regemail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';

$insertSuccess = false;
$formError = array();

$communes = new communes();
$communesList = $communes->getCommunesList();

$users = new users();

//Etape 1 : Vérifier que le formulaire n'est pas vide
if (isset($_POST['submit'])) {
    if (count($_POST) > 0) {
        if (!empty($_POST['lastName'])) {
            if (preg_match($regName, $_POST['lastName'])) {
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

        //Je verifie que mon champ password existe et n'est pas vide 
        if (empty($_POST['password'])) {
            $formError['password'] = 'Le mot de passe  n\'est pas renseigné';
        }

        //Je verifie que mon champ passwordConfirm existe et n'est pas vide 
        if (empty($_POST['passwordConfirm'])) {
            $formError['passwordConfirm'] = 'Veuillez confirmer votre mot de passe!';
        }

        if (!isset($formError['password']) && !isset($formError['passwordConfirm'])) {
//Si password different passwordConfirm j'affiche le message d'erreurs sur le mot de passe
            if ($_POST['password'] == $_POST['passwordConfirm']) {
                //sitout est bon,j'efface les espaces de debut et de fin du mot de passe saisi, je le hash pour le securiser et je l'assigne à l'attribut password de mon objet users pour pouvoir l'inserer dans ma base de données.
                $users->password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            } else {
                $formError['password'] = 'Les mot de passe ne sont pas identiques!';
            }
        }
//        if (!empty($_POST['idCommunes'])) {
//            $users->idCommunes = $_POST['idCommunes'];
//        } else {
//            $formError['idCommunes'] = 'La commune  n\'est pas renseignée';
//        }

        //Ici j'appelle la methode que j'ai crée dans mon model pour envoyer les infos dans la base de données
        if (count($formError) == 0) {
            if ($users->addUsers()) {
                $insertSuccess = true;
                $users->lastName = '';
                $users->firstName = '';
                $users->phoneNumber = '';
                $users->email = '';
                $users->password = '';
//                $users->idCommunes = '';
            } else {
                $formError['add'] = 'L\'utilisateur n\'a pas pu être créé';
            }
        }
    }
}    

    