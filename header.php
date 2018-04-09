
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="icon" href="assets/img/favicon2.png">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Accueil</title>
    </head>
    <body>           
        <nav class="navbar navbar-default">
            <div class="navbar">
                <!-- Permet un meilleur affichage sur mobile -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand1" href="#"><img alt="Brand" src="assets/img/favicon.png"></a>
                    <a class="brand2" href="#">Gara Poupou</a>
                </div>
                <!-- affiche les liens de la nav -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Accueil</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle  btn btn-info btn-sm" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exploitations <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="exploitations.php">Liste des exploitations</a></li>
                                <?php
                                if (!empty($_SESSION['id'])) {
                                    ?>    
                                    <li><a href="exploitations.php?idUsers= <?= $_SESSION['id'] ?>">Mes exploitations</a></li>
                                    <?php
                                }
                                ?>
                                <li><a href="annonces.php">Ajouter une exploitation</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Ajouter une annonce</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Articles et conseils sanitaires</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transporteurs <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="transporteurs.php">Les sociétés de transports</a></li>
                                <?php
                                if (!empty($_SESSION['id'])) {
                                    ?>    
                                    <li><a href="transporteurs.php?idUsers=<?= $_SESSION['id'] ?>">Mes sociétés de transports</a></li>
                                    <?php
                                }
                                ?>
                                <li><a href="annonces.php">Ajouter une société de transport</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Ajouter une annonce</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Articles et conseils sanitaires</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Camions<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="camions.php">Liste des camions</a></li>
                                <?php
                                if (!empty($_SESSION['id'])) {
                                    ?>    
                                    <li><a href="camions.php?idUsers=<?= $_SESSION['id'] ?>">Mes camions</a></li>
                                    <?php
                                }
                                ?>
                                <li><a href="annonces.php">Ajouter un camion</a></li>                               
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Ajouter une annonce</a></li>                              
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Articles et conseils sanitaires</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vivriers et Avicoles<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="produits.php">Liste des produits publiés</a></li>
                                <?php
                                if (!empty($_SESSION['id'])) {
                                    ?>    
                                    <li><a href="produits.php?idUsers=<?= $_SESSION['id'] ?>">Mes publications</a></li>
                                    <?php
                                }
                                ?>
                                <li><a href="annonces.php">Ajouter un produit</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Ajouter une annonce</a></li>                              
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Articles et conseils sanitaires</a></li>
                            </ul>
                        </li>
                        <li><a href="annonces.php" class=" btn btn-info btn-md">Votre annonce ici !</a></li>
                    </ul>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <ul class="nav navbar-nav navbar-right">                      
                            <li></span>Bon retour parmi nous, <a href="profiluser.php?id=<?= $_SESSION['id'] ?>"><?= $_SESSION['firstName'] ?>!</a></li>
                            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Déconnexion</a></li>

                        </ul>
                    <?php } else { ?>
                        <ul class="nav navbar-nav navbar-right">                      
                            <li><a href="inscription.php" class=" btn btn-info btn-md"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Inscription</a></li>
                            <li><a href="connexion.php" class=" btn btn-info btn-md"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Connexion</a></li>
                        </ul>
                    <?php } ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <div class="container">
            <div id="flashinfo" class="row">
                <div class="col-xs-12 col-sm-10 col-md-6 col-lg-2 effet">FLASH INFO !</div>
                <div class="col-lg-10">
                    <marquee class="back" scrollamount="3">Arrivage de deux camions de manioc doux et d'ignames bètèbètè au marché gouro d'Adjamé.</marquee> 
                </div>       
            </div>




