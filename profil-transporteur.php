<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/hauliersModel.php';
include_once 'controllers/profil-transporteurController.php';
?>
<div id="profilHauliers" class="container">
    <div  class="row text-aligne">
        <div class="infoHauliers">
        <div class="col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">
            <p> <?= $hauliersList->name ?></p>        
            <p><?= $hauliersList->phoneNumber ?></p> 
            <p><a class="btn-md" href="transporteurs.php?transporteursId=<?= $hauliersList->id ?>">Liste des transporteurs</a></p>
            <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button> </p>
        </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
