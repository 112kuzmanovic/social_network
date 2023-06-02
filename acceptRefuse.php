<?php require_once "bootstrap.php" ?>
<?php if(isset($_POST['accept'])){
    $friendRequest=$_POST['friendRequest'];
    $confirm=$profil->confirm($friendRequest);
} ?>
<?php require_once "index.php"; ?>