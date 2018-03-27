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
            <p> <?= $hauliers->name ?></p>        
            <p><?= $hauliers->phoneNumber ?></p>                 
        </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
