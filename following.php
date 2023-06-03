<?php require_once "views/partials/navbar.php" ?>
<?php require_once "bootstrap.php" ?>

<?php 
if(isset($_GET['id']))
{$id=$_GET['id'];} ?>
<?php $following = $profil->following($id); ?>
<h2 style="margin-top:15px;margin-left:15px"><i>Followers:<?php echo count($following) ?></i></h2>

<?php foreach ($following as $friend): ?>
    <a href="profil.php?id=<?php echo $friend->sender_id ?>"class="btn btn-outline-primary"><p><?php echo $friend->name.' '.$friend->surname ?></p></a><br><br>
<?php endforeach ?>