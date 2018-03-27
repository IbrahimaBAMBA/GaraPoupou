è
<?php
include_once 'models/database.php';
include_once 'models/wholeSalePriceModel.php';
include_once 'controllers/coursController.php';
?>
<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">  
                <h2><span class="ion-minus"></span>Cours bord champ des vivriers<span class="ion-minus"></span></h2>
                <p>Pour la semaine du lundi ../../.... au ../../....</p><br>
            </div> 
        </div>  
        <div class="row">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/citronprix.jpg" alt="Citron" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/avocatprix.jpg" alt="Avocat" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/poivronprix.jpg" alt="Poivron" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/tomateprix.jpeg" alt="Tomate" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> <!-- row -->
                    </div> <!-- item -->
                    <div class="item">
                        <div class="row">
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/concombreprix.jpg" alt="Concombre" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/carotteprix.jpg" alt="Carotte" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/ignameprix.jpg" alt="Igname" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach ($wholeSalePriceList as $wholeSalePrice) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="assets/img/prix_produit/chouprix.jpg" alt="Chou" width="100%">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $wholeSalePrice->communeName ?></h4>
                                            <p class="card-text"><?= $wholeSalePrice->sellPrice ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->sellStartTime ?></p>
                                            <p class="card-text"><?= $wholeSalePrice->productName ?></p>
                                            <p class="card-text">Ce prix est homologué par le conseil national de lutte contre la vie chère.</p>
                                            <a class="btn btn-default" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> <!-- row -->
                    </div> <!-- item -->
                </div>
            </div>
        </div>
    </div>
</section>
