<?php require_once "bootstrap.php"; ?>
<?php
if(isset($_SESSION['loggedUser'])){
    $requests = $profil->viewRequest();
    $loggedId=$_SESSION['loggedUser']->users_id;
    $signal=$profil->signal($loggedId);
    if($signal!=NULL){
      foreach($signal as $sig);
    }
}



?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">SocialNetwork</a>

    <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['loggedUser'])): ?>

        <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
        </li>
        <?php if($requests==NULL): ?>
            <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i></a>
            </li>
        <?php else: ?>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop">
<i style="color:red" class="fa fa-users" aria-hidden="true"></i><sup style="color:red"><?php echo count($requests); ?></sup>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Requests:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php foreach($requests as $request): ?>
          
            <form action="acceptRefuse.php"method="POST">
                <input type="hidden" name="friendRequest"value="<?php echo $request->sender_id ?>">
                <input type="hidden" name="loggedId"value="<?php echo $loggedId ?>">
                <a href="profil.php?id=<?php echo $request->sender_id ?>"><b><img style="height:25px;width:25px;border-radius:50%" src="././classes/images/<?php echo $request->image?>" alt=""><?php echo $request->name.' '.$request->surname ?></b></a>
                <button name="accept" type="submit" class="btn btn-success btn-sm">Accept</button>
                <button name="ignore"type="submit" class="btn btn-danger btn-sm">Ignore</button>
            </form><br>
        <?php endforeach ?>
      </div>
      
    </div>
  </div>
</div>
        <?php endif ?>
        
        <?php if($signal==NULL): ?>
          <li class="nav-item">
              <a href="" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              </li>
        
          <?php else: ?>
             
            <?php if($sig->visit==0): ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i style="color:red" class="fa fa-info-circle" aria-hidden="true"></i><sup style="color:red"><?php echo count($signal); ?></sup>
            </button>
            <?php else: ?>
              <li class="nav-item">
              <a href="" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
              </li>
            <?php endif ?>
            
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="isVisit.php" method="POST">
      <div class="modal-body">
        <?php foreach ($signal as $sig): ?>
          <p></B><?php echo '<b>'.$sig->name.' '.$sig->surname.'</b>'.' '.'is accepted your request!' ?></p>
        <?php endforeach ?>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="loggedId" value="<?php echo $loggedId ?>">
        <input type="hidden" name="id" value="<?php echo $sig->recipient_id ?>">
        <button type="submit" name="visit" class="btn btn-primary">OK</button>
      </div>
        </form>
    </div>
  </div>
</div>
        <?php endif ?>


        <li class="nav-item">
            <a href="./user.php?user_id=<?php echo $_SESSION['loggedUser']->users_id ?>"class="nav-link"><?php echo $_SESSION['loggedUser']->name ?></a>
        </li>
        <li class="nav-item">
            <a href="logout.php"class="nav-link">Logout</a>
        </li>     
        <?php else: ?>
            <li class="nav-item">
            <a href="login_register.php"class="nav-link">Login/Register</a>
            </li>
        <?php endif ?>
    </ul>
</nav>


