<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (!isset($_SESSION['lastName'])){
      header ('location: connexion.php');
      exit;
}
?>
<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/hauliersModel.php';
include_once 'controllers/profil-transporteurController.php';
?>
<div id="profilHauliers" class="container">
    <div  class="row infoHauliers">
      
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-2">
            <img src="#" class="img-thumbnail" alt="" > 
        </div>
       <div class="col-xs-12 col-sm-12 col-md-7 col-lg-offset-1 col-lg-9">
            <p> <?= $hauliersList->name ?></p>        
            <p><?= $hauliersList->phoneNumber ?></p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button>
                <button type="button" class="btn btn-info">Modifier</button>
                <a class="btn-md" href="transporteurs.php?transporteursId=<?= $hauliersList->id ?>">Liste des transporteurs</a></p>
        </div>
       
    </div>
</div>
<?php include 'footer.php'; ?>
