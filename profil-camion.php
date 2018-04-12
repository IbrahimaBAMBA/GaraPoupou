<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (!isset($_SESSION['lastName'])) {
    header('location: connexion.php');
    exit;
}
?>
<?php include 'header.php'; ?>
<?php
include_once 'models/database.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profil-camionController.php';
?>
<!--<div  id="profilTrucks" class="row text-aligne">
    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-offset-1 col-lg-2 infoTrucks">
            <img src="#" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 ">         
            <p> <?= $trucks->name ?></p>        
            <p><?= $trucks->imageLink ?></p>                 
            <p><?= $trucks->volume ?></p> 
            <p><a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>
            <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button> </p> 
        </div>   
</div>-->

<!--<div id="profilTrucks"  class="container">
    <div  class="row text-aligne">
        <div class="infoTrucks">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-offset-1 col-lg-2 ">
                <img src="#" class="img-thumbnail" alt="" > 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-offset-1 col-lg-10 ">
                <p> <?= $trucks->name ?></p>        
                <p><?= $trucks->imageLink ?></p>                 
                <p><?= $trucks->volume ?></p> 
                <p><a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>
                <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
                <p> <button type="button" class="btn btn-info">Supprimer</button> </p>
            </div>
        </div>
    </div>
</div>-->
<div id="profilTrucks" class="container">
    <div class="row infoTrucks">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-2">
            <img src="#" class="img-thumbnail" alt="" >  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-offset-1 col-lg-9">
            <p> <?= $trucks->name ?></p>        
            <p><?= $trucks->imageLink ?></p>                 
            <p><?= $trucks->volume ?></p>            
            <p> <button type="button" class="btn btn-info">Modifier</button>
                <button type="button" class="btn btn-info">Supprimer</button> 
                <a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>                           
        </div>
    </div>
</div>
<?php include 'footer.php'; ?> 