<?php
$avatarProfile = new avatar();
    
if ($_SESSION['id']) {
    $avatarProfile->idUser = $_SESSION['id'];
    $avatarDisplayed = $avatarProfile->getAvatarById();
}
?>