<?php if(isset($_SESSION['loggedUser'])):?>
  <?php  $user=$user->getUserWithId($_SESSION['loggedUser']->users_id);?>
<?php $profil_image=$profil_image->selectProfileImage($_SESSION['loggedUser']->users_id);?>
<div class="profileImg"><img style="width:70px;height:70px;border-radius:50%" class="float-left" src="classes/images/<?php if($profil_image==null){echo 'no-image-icon-0.png';}else{echo $profil_image->image ;} ?>" alt=""></div>
<h4 class="float-left"><?php echo $user[0]->name.' '.$user[0]->surname ?></h4><br><br>
<p class="float-left"><?php echo $user[0]->email ?></p>
<?php require_once "views/add_post.view.php" ?>
<?php endif ?>
<h5>Home page</h5>








 <?php require_once "views/allPosts.view.php" ?>

