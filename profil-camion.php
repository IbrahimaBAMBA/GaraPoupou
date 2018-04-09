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
<?php include 'header.php';?>
<?php
include_once 'models/database.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profil-camionController.php';
?>
<div id="profilTrucks" class="container">
    
    <div  class="row text-aligne">
        <div class="infoTrucks">
        <div class="col-xs-12 col-sm-4 col-lg-1 col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">         
            <p> <?= $trucks->name ?></p>        
            <p><?= $trucks->imageLink ?></p>                 
            <p><?= $trucks->volume ?></p> 
            <p><a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>
            <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button> </p>                 
        </div>
        </div>
    </div>
   
</div>

<?php include 'footer.php'; ?> 