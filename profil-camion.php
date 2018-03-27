<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profil-camionController.php';
?>
<div id="profilTrucks" class="container">
    <div  class="row text-aligne">
        <div class="infoTrucks">
        <div class="col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">
            <p> <?= $trucks->name ?></p>        
            <p><?= $trucks->phoneNumber ?></p>                 
            <p><?= $trucks->volume ?></p>                 
        </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
