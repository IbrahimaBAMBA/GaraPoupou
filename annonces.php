<?php include 'header.php' ?>
<?php 
if (!isset($_SESSION['lastName'])){
      header ('location: connexion.php');
      exit;
}
?>

<?php include 'footer.php'; ?> 
