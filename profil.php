<?php require_once "bootstrap.php" ?>
<?php require_once "views/partials/navbar.php" ?>
<?php if(isset($_GET['id']) && isset($_SESSION['loggedUser'])):?>
  <?php
  $idLogged=$_SESSION['loggedUser']->users_id;
  $id=$_GET['id'];
  $posts=$post->selectAllPosts();
  $profil_image=$profil_image->selectProfileImage($id) ;
  $user=$user->getUserWithId($id);
 
?>
  
  
  
<div class="jumbotron">
    <img style="height:200px;width:200px;border-radius:50%" src="classes/images/<?php if($profil_image==NULL){echo 'no-image-icon-0.png';}else{ echo $profil_image->image;} ?>" alt="">
    
    <?php require_once "statusRequest.php"; ?>
        
    <h4 class="float-right"><?php echo $user[0]->name .' '.$user[0]->surname ?></h4><br><br>
    <p class="float-right"><i><?php echo $user[0]->email ?></i></p>
</div>
<?php foreach($posts as $post): ?>
    <?php if($post->users_id==$id): ?>
        <div class="container">
    <div class="row">
        <div class="col-6 offset-4">
            <div class="card">
                <div class="card-header">
                    <a href="profil.php?id=<?php echo $post->users_id ?>"><img src="classes/images/<?php echo $post->image ?>"style="width:50px;height:50px;border-radius:50%" alt=""><?php echo $post->name.' '.$post->surname ?></a>
                    <p><i><sub class="float-right"><?php echo $post->time_of_posts ?></sub></i></p>
                </div>

                <div class="card-body">
                    <p><?php echo $post->posts ?></p>
                </div>

            </div>
        </div>
    </div>
</div><br>
    <?php endif ?>
<?php endforeach ?>
<?php else: ?>
    <?php require_once "index.php"; ?>
<?php endif ?>


