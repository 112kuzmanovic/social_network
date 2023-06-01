<?php 
require_once "bootstrap.php";
if(isset($_POST['registerBtn'])){
    $user->registerUser();
    

}
if(isset($_POST['loginBtn'])){
    $user->logUser();
}

if(isset($_POST['del'])){
    $del->delete();
}


require_once "views/login.register.view.php";
?>