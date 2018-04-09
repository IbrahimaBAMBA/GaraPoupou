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
include_once 'models/productsDetailsModel.php';
include_once 'controllers/profil-produitController.php';
?>
<div id="profilVegetableProduct" class="container">
    <div  class="row text-aligne">
        <div class="infoVegetableProduct">
        <div class="col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">
            <p> <?= $productsDetails->name ?></p>        
            <p><?= $productsDetails->publicationDate ?></p> 
            <p><a class="btn-md" href="produits.php?produitsId=<?= $productsDetails->id ?>">Liste des produits</a></p>
            <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button> </p>
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>