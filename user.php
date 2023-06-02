<?php require_once "bootstrap.php";?>
<?php require_once "views/partials/navbar.php" ?>
<?php if(isset($_SESSION['loggedUser'])){
  $id=$_SESSION['loggedUser']->users_id;
} ?>
<?php $user=$user->getUserWithId($id) ?>
<?php $profil_image=$profil_image->selectProfileImage($id) ?>
<?php $following = $profil->following($id); ?>
<?php $followers = $profil->followers($id) ?>




<div class="jumbotron">
    <div class="profile_image">
        <div class="profileImg"><img style="width:200px;height:200px;border-radius:50%" class="float-left" src="classes/images/<?php if($profil_image==null){echo 'no-image-icon-0.png';}else{echo $profil_image->image ;} ?>" alt=""></div>
        <h4 class="float-right"><?php echo $user[0]->name.' '.$user[0]->surname ?></h4><br><br>
        <p class="float-right"><?php echo $user[0]->email ?></p>
        <form action="insertImage.php"method="POST" enctype = "multipart/form-data">
            
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Update Profile Image
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


<?php $posts=$post->allPostsFromUser($id); ?>

    
<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <a href="following.php?id=<?php echo $id ?>" class="btn btn-outline-primary float-left"><i>Following:(<?php echo count($following); ?>)</i></a>
      <a href="followers.php?id=<?php echo $id ?>" class="btn btn-outline-primary float-right"><i>Followers:(<?php echo count($followers); ?>)</i></a><br><br>
      
      <?php if($posts!=NULL): ?>
        <?php foreach($posts as $post): ?>
          <div class="card">
            <div class="card-header">
              <img src="classes/images/<?php echo $profil_image->image ?>"style="width:30px;height:30px;border-radius:50%" alt="">
              <?php echo $user[0]->name.' '.$user[0]->surname ?>
              <p class="float-right"><i><sub><?php echo $post->time_of_posts ?></sub></i></p>
            </div>
            <div class="card-body">
            <p><i><?php echo $post->posts ?></i></p>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>

    </div>
  </div>
</div>
