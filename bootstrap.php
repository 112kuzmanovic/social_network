<?php 
session_start();
require_once "views/partials/top.php";
$config = require "config.php";

require "classes/Connection.php";
$db = Connection::connect($config['database']);
require "classes/QueryBuilder.php";
require_once "classes/User.php";
require_once "classes/Post.php";
require_once "classes/Profil.php";


$query = new QueryBuilder($db);

$user = new User($db);

$profil_image=new User($db);

$img=new User($db);

$post = new Post($db);

$profil = new Profil($db);

function test($test){
    echo "<pre>";
    var_dump($test);
    echo "</pre>";
}
?>