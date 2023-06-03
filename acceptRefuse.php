<?php require_once "bootstrap.php" ?>
<?php if(isset($_POST['accept'])){
    $friendRequest=$_POST['friendRequest'];
    $confirm=$profil->accept($friendRequest);
} ?>
<?php if(isset($_POST['ignore'])){
    $friendRequest=$_POST['friendRequest'];
    $loggedId=$_POST['loggedId'];
    $profil->ignoreRequest($loggedId,$friendRequest);
    require_once "index.php";
} ?>
