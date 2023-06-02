<?php require_once "bootstrap.php" ?>
<?php $posts=$post->selectAllPosts() ?>

<?php if(isset($_SESSION['loggedUser'])): ?>



<?php foreach ($posts as $post): ?>
    <div class="container">
    <div class="row">
        <div class="col-6 offset-4">
            <div class="card">
                <div class="card-header">
                    <a href="<?php if($post->users_id==$_SESSION['loggedUser']->users_id){echo "user.php?id=".$post->users_id;}else{echo "profil.php?id=".$post->users_id;}?>"><img src="classes/images/<?php echo $post->image ?>"style="width:50px;height:50px;border-radius:50%" alt=""><?php echo $post->name.' '.$post->surname ?></a>
                    <p><i><sub class="float-right"><?php echo $post->time_of_posts ?></sub></i></p>
                </div>

                <div class="card-body">
                    <p><?php echo $post->posts ?></p>
                </div>

            </div>
        </div>
    </div>
</div><br>
<?php endforeach ?>
<?php endif ?>

