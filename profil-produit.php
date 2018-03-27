<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/productsDetailsModel.php';
include_once 'controllers/profil-produitsController.php';
?>
<div id="profilVegetableProduct" class="container">
    <div  class="row text-aligne">
        <div class="infoVegetableProduct">
        <div class="col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">
            <p> <?= $product->name ?></p>
        
            <p><?= $product->publicationDate ?></p>                 
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>