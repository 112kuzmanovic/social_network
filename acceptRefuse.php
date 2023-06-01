<?php require_once "bootstrap.php" ?>
<?php if(isset($_POST['accept'])){
    $frendRequest=$_POST['frendRequest'];
    test($frendRequest);
} ?>