<?php
include_once 'header.php';
include_once 'controllers/profil-Controllers.php';
include_once 'controllers/insertAvatar-Controller.php';
include_once 'controllers/deleted-Controllers.php';
?>
<div class="container-fluid">
  <div class="row marginTop center">
    <img src="<?= (isset($avatarDisplayed->path_Avatar)?$avatarDisplayed->path_Avatar:"assets/img/imgpr.png") ?>"  height="150" width="150" class="img-circle img-responsive" id="avatar" alt="<?= $_SESSION['pseudoConnection'] . ", avatar" ?>" />
    <form id="formNewAvatar" class="marginTop" action="" method="post" enctype="multipart/form-data">
        <label for="newAvatar" class="col-xs-4">Avatar de l'utilisateur</label>
        <input type="file" id="newAvatar" name="newAvatar" class="col-xs-4" />
        <input type="submit" id="submitNewAvatar" name="submitNewAvatar" class="col-xs-2 btn-default" />
    </form>
</div>
    <?php foreach ($messageErrorAvatar as $error) { ?>
        <p class="marginTop container-fluid center"><?= $error ?></p>
    <?php } ?>
  <!--On crée plusieurs champs correspondant chacune à une information à modifiée-->
  <div class="row marginTop">
    <form method="post" action="Modification-profil">
        <div class="container-fluid">
            <div class="col-lg-6 center">
              <p><label for="lastName">Nom</label></p>
            </div>
            <div class="col-lg-6 center">
                <!--Chaque champs à comme valeur par défault les valeurs de l'utilisateurs-->
                <p><input type="text" name="lastName" id="lastName" placeholder="Nom"  value="<?= $_SESSION['lastName'] ?>" /></p>
                <!--Si une erreur survient, on affiche un message d'erreur-->
                <?php if(isset($formMessageModification['lastName'])) { ?>
                    <p><?= $formMessageModification['lastName'] ?></p>
                <!--Sinon on affiche une message montrant que la modification est réussie-->
                <?php } else if(!empty($_POST['lastName'])) { ?>
                    <p>Le nom est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-6 center">
              <p><label for="firstName">Prénom</label></p>
            </div>
            <div class="col-lg-6 center">
                <p><input type="text" name="firstName" id="firstName" placeholder="Prénom"  value="<?= $_SESSION['firstName'] ?>" /></p>
                <?php if(isset($formMessageModification['firstName'])) { ?>
                    <p><?= $formMessageModification['firstName'] ?></p>
                <?php } else if(!empty($_POST['firstName'])) { ?>
                    <p>Le prénom est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-6 center">
              <p><label for="pseudo">Pseudo</label></p>
            </div>
            <div class="col-lg-6 center">
                <p><input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"  value="<?= $_SESSION['pseudoConnection'] ?>" /></p>
                <?php if(isset($formMessageModification['pseudo'])) { ?>
                    <p><?= $formMessageModification['pseudo'] ?></p>
                <?php } else if(!empty($_POST['pseudo'])){ ?>
                    <p>Le pseudo est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-6 center">
                <p><label for="mail">Adresse mail</label></p>
            </div>
            <div class="col-lg-6 center">
                <p><input type="email" name="mail" id="mail" placeholder="Adresse mail"  value="<?= $_SESSION['mail'] ?>" /></p>
                <?php if (isset($formMessageModification['mail'])) { ?>
                    <p><?= $formMessageModification['mail'] ?></p>
                <?php } else if (!empty($_POST['mail'])) { ?>
                    <p>L'addresse mail est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
            <!--Permet d'envoyer les modification du profil-->
            <div class="col-lg-12 center">
                <input type="submit" class="btn-default" value="Envoyer" name="updateSubmit" />
            </div>
      </form>
      <form action="" method="post">
            <div class="container-fluid">
                <div class="col-lg-6 center">
                  <p><label for="password">Mot de passe</label></p>
                </div>
                <div class="col-lg-6 center">
                  <p><input type="password" name="password" id="password" placeholder="Mot de passe" /></p>
                    <?php if(isset($formErrorPassword['password'])) { ?>
                        <p><?= $formErrorPassword['password'] ?></p>
                    <?php } else if(!empty($_POST['password'])){ ?>
                        <p>Le mot de passe est bien modifié.</p>
                    <?php } ?>
                </div>
            </div>
        <!--Permet d'envoyer les modification du mot de passe-->
        <div class="col-lg-12 center">
            <input type="submit" class="btn-default" value="Envoyer" name="updateSubmitPassword" />
        </div>
      </form>
  </div>
</div>
<!--Permet de supprimer le profil-->
<div class="container-fluid center marginTop">
    <form method="post" action="">
        <input type="submit" class="btn-default" name="submitDelete" value="Tu veux supprimer ton profil ?" />
    </form>
</div>
<?= include_once 'footer.php' ?>
