<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/productsDetailsModel.php';
include_once 'controllers/produitsController.php';
?>
<div class="item-listing small-padding-bg">
    <div class="container">
        <div class="row">
            <?php foreach ($productsDetailsList as $productsDetails) { ?>
            <div class="col-md-2"><a href="#"><img src="assets/img/img_produits_vivriers/aubergines.jpg" alt="" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                        <h1><?= $productsDetails->name ?></h1>
                    <p><?= $productsDetails->publicationDate ?></p>
                    <p><?= $productsDetails->imageLink ?></p>
                    <p><a class="btn-md" href="profil-produit.php?productId=<?= $productsDetails->id ?>">Profil</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i>+images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i>SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>  
            <?php foreach ($productsDetailsList as $productsDetails) { ?>
            <div class="col-md-2"><a href="#"><img src="assets/img/img_produits_vivriers/aubergines.jpg" alt="" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                        <h1><?= $productsDetails->name ?></h1>
                    <p><?= $productsDetails->publicationDate ?></p>
                    <p><?= $productsDetails->imageLink ?></p>
                    <p><a class="btn-md" href="profil-produit.php?productId=<?= $productsDetails->id ?>">Profil</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i>+images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i>SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>