
<?php
$regemail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$insertSuccess = false;
$formError = array();
$users = new users();

//Etape 1 : Vérifier qu'on a bien envoyé quelque chose avec le formulaire
if (count($_POST) > 0) {
    //Etape 2 : Vérifier que le mail a bien été renseigné et créer une erreur si ce n'est pas fait
    if (!empty($_POST['email'])) {
        //Etape 3 : Vérifier que le mail est bien un mail sinon créer une erreur
        if (preg_match($regemail, $_POST['email'])) {
            //Etape 4 : Si tout va bien, mettre le mail tapé dans l'attribut de notre objet $users
            $users->email = $_POST['email'];
        } else {
            $formError['email'] = 'Le mail n\'est pas un mail valide';
        }
    } else {
        $formError['email'] = 'Le mail doit être renseigné';
    }

    //Etape 5 : Vérifier qu'on a bien entré un mot de passe sinon on crée une erreur
    if (!empty($_POST['password'])) {
        //On vérifie qu'il n'y a pas eu d'erreur plus tôt
        if (!isset($formError['email'])) {
            //Etape 6 : On va récupérer le mot de passe enregistré dans la base de données pour le comparer à celui qui a été tapé
            $userPassword = $users->getPasswordByEmail();
            //Etape 7 : On vérifie que l'on a bien récupérer un objet. Si c'est un objet c'est notre résultat (PDO::FETCH_OBJ), si c'est un string c'est une erreur de requête (on a défini un message d'erreur), si c'est false, c'est que le mail n'existe pas
            if (is_object($userPassword)) {
                //Etape 8 : Vérifier que le mot de passe est le bon. Si c'est le bon password_verify renvoie true, sinon elle renvoie false
                if (password_verify($_POST['password'], $userPassword->password)) {
                    //Etape 9 : Si tout va bien on récupère les infos de notre utilisateur et on démarre une session
                    //logged = connecté
                    $loggedUser = $users->getUserByEmail();
                    if (is_object($loggedUser)) {
                        //Tout s'est bien passé
                        session_start();
                        $_SESSION['id'] = $loggedUser->id;
                        $_SESSION['lastName'] = $loggedUser->lastName;
                        $_SESSION['firstName'] = $loggedUser->firstName;
                        header('location:index.php');
                        exit;
                    } else if (!$loggedUser) {
                        //Pas de résultat dans la base
                        $formError['connection'] = 'Mauvais identifiant ou mot de passe';
                    } else {
                        //Il y a une erreur de requête (on a défini un message d'erreur)
                        $formError['connection'] = $loggedUser;
                    }
                } else {
                    //Mauvais mot de passe
                    $formError['connection'] = 'Mauvais identifiant ou mot de passe';
                }
            } else if (!$userPassword) {
                //L'identifiant est faux mais on ne donne pas cette indication à l'utilisateur au cas ce serait de pas commode
                $formError['connection'] = 'Mauvais identifiant ou mot de passe';
            } else {
                //S'il y a une erreur dans la requête / connexion / base de données, on récupère un message d'erreur, on le stocke dans notre tableau d'erreurs
                $formError['connection'] = $userPassword;
            }
        }
    } else {
        $formError['password'] = 'Le mot de passe doit être renseigné';
    }
}