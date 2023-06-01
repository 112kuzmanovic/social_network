<?php require_once "bootstrap.php"; ?>
<?php $allPosts=$post->allPosts(); ?>



<?php if(isset($_SESSION['loggedUser'])): ?>
<?php foreach ($allPosts as $all): ?>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header"><img style="width:40px;height:40px;border-radius:50%" src="classes/images/<?php echo $all->image ?>" alt=""><h6><?php echo $all->name.' '.$all->surname  ?></h6><sub><?php echo $all->time_of_posts ?></sub></div>
                <div class="card-body"><p><?php echo $all->posts ?></p></div>
            </div>
            </div>
        </div>
    </div><br>
<?php endforeach ?>
<?php endif ?>