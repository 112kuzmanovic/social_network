<?php require_once "bootstrap.php"; ?>
<?php
if(isset($_SESSION['loggedUser'])){
    $requests = $profil->viewRequest(); 
    
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
                <a href="profil.php?id=<?php echo $request->sender_id ?>"><b><?php echo $request->name.' '.$request->surname ?></b></a>
                <button name="accept" type="submit" class="btn btn-success btn-sm">Accept</button>
            </form>
        <?php endforeach ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
        <?php endif ?>
        
        
        <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
        </li>


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
