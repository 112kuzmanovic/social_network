<?php require_once "bootstrap.php"; ?>
<?php if(isset($_POST['visit'])){
    $loggedId = $_POST['loggedId'];
    $id=$_POST['id'];
    $profil->isVisit($loggedId,$id);
} 
require_once "index.php";
?>
