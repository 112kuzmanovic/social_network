<?php require_once "bootstrap.php" ?>
<?php require_once "views/partials/navbar.php" ?>
<?php if(isset($_GET['id'])):?>
    <?php $id=$_GET['id'] ?>
    <?php $profil = $profil->getProfil($id) ?>



    <div class="jumbotron">
        <div class="profilImg"><img style="height:200px;width:200px;border-radius:50%" src="classes/images/<?php echo $profil[0]->current_img ?>" alt=""></div>
        <h5 class="float-left"><?php echo $profil[0]->name.' ' .$profil[0]->surname?></h5><br><br>
        <form action="">
            <button class="btn btn-primary">+Send request</button>
        </form>
    </div>
    <?php foreach ($profil as $statusi): ?>
    <div class="container">
        <div class="row">
            <div class="coll-6 offset-4">
                <div class="card">

                    <div class="card-header">
                        <img style="height:30px;width:30px;border-radius:50px" src="classes/images/<?php echo $statusi->current_img ?>" alt="">
                        <?php echo $statusi->name.' '.$statusi->surname ?>
                        <p><i><sub class="float-right"><?php echo $statusi->time_of_posts ?></sub></i></p>
                    </div>

                    <div class="card-body"><?php echo $statusi->posts ?></div>
                </div>
            </div>
        </div>
    </div><br>
    <?php endforeach ?>
<?php endif ?>
<!-- <?php test($profil) ?> -->