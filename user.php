<?php require_once "bootstrap.php";?>
<?php require_once "views/partials/navbar.php" ?>
<?php $user=$user->getUserWithId($_SESSION['loggedUser']->users_id) ?>
<?php $profil_image=$profil_image->selectProfileImage($_SESSION['loggedUser']->users_id) ?>
<!-- <?php test($user) ?> -->



<div class="jumbotron">
    <div class="profile_image">
        <div class="profileImg"><img style="width:200px;height:200px;border-radius:50%" class="float-left" src="classes/images/<?php if($profil_image==null){echo 'no-image-icon-0.png';}else{echo $profil_image->image ;} ?>" alt=""></div>
        <h4 class="float-right"><?php echo $user[0]->name.' '.$user[0]->surname ?></h4><br><br>
        <p class="float-right"><?php echo $user[0]->email ?></p>
        <form action="insertImage.php"method="POST" enctype = "multipart/form-data">
            
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Insert Profile Image
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="file" name="image" value="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="insertProfileImg" type="submit" class="btn btn-primary">Upload </button>
      </div>
    </div>
  </div>
</div>
        </form>

    </div>
</div>
<?php require_once "views/add_post.view.php" ?>