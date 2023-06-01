<?php require_once "bootstrap.php" ?>
<?php 
if(isset($_POST['insertProfileImg'])){
    $user->insertProfileImage();
}
?>
<?php require_once "user.php" ?>