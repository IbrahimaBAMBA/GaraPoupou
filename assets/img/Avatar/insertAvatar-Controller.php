<?php
$userAvatar = new avatar();
$messageErrorAvatar = array();
$messageAvatar = array();
if (isset($_POST['submitNewAvatar'])) {
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (!empty($_FILES['newAvatar']['name']) && $_FILES['newAvatar']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['newAvatar']['size'] <= 20000000) {
                $userAvatar->idUser = $_SESSION['id'];
                $userAvatar->deleteAvatarById();
                // Testons si l'extension est autorisée
                $fileType = pathinfo($_FILES['newAvatar']['name']);
                $extension_upload = $fileType['extension'];
                $extensions_autorisees = array('png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    if (!file_exists('avatar/' . $_SESSION['pseudoConnection'])) {
                        // On peut valider le fichier et le stocker définitivement
                        mkdir('avatar/' . $_SESSION['pseudoConnection'], 0755, true);
                        move_uploaded_file($_FILES['newAvatar']['tmp_name'], 'avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name']);
                        chmod('avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name'], 0755);
                        //On récupère l'id de l'utilisateur pour l'associer au chemin du fichier
                        $userAvatar->id = $_SESSION['id'];
                        $userAvatar->pathAvatar = 'avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name'];
                        $userAvatar->insertAvatar();
                        $messageErrorAvatar['succes'] = 'Envoie effectué';
                        header('Location: Modification-profil');
                    } else {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['newAvatar']['tmp_name'], 'avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name']);
                        chmod('avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name'], 0755);
                        //On récupère l'id de l'utilisateur pour l'associer au chemin du fichier
                        $userAvatar->idUser = $_SESSION['id'];
                        $userAvatar->pathAvatar = 'avatar/' . $_SESSION['pseudoConnection'] . '/' . $_FILES['newAvatar']['name'];
                        $userAvatar->insertAvatar();
                        $messageErrorAvatar['succes'] = 'Envoie effectué';
                        header('Location: Modification-profil');
                    }
                } else {
                    $messageErrorAvatar['extensionFile'] = 'L\'extension du fichier n\'est pas autorisée.';
                }
            } else {
                $messageErrorAvatar['sizeFile'] = 'Le fichier est trop lourd.';
            }
    } else {
        $messageErrorAvatar['emptyFile'] = 'Il faut envoyer un avatar au format PNG.';
    }
}
?>