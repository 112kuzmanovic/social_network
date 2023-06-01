<?php require_once "bootstrap.php"; ?>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">SocialNetwork</a>

    <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['loggedUser'])): ?>

        <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i></a>
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
