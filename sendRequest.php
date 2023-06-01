<?php require_once "bootstrap.php" ?>

<?php if(isset($_POST['sendRequest'])){
    $profil->sendRequest();
} ?>
<?php require_once "index.php" ?>