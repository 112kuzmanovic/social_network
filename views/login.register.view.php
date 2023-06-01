<?php require_once "partials/top.php";?>
<?php if(isset($_SESSION['loggedUser'])){
    header('Location: index.php');
} ?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a href="" class="navbar-brand">Bloger</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link">Back to Blog</a>
        </li>
    </ul>
</nav>

<div class="jumbotron text-center">
    <h3>Login/register</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h4>Login</h4>
            <form action="login_register.php" method="POST">
                <input type="text" name="login_email" placeholder="email" class="form-control" required><br>
                <input type="password" name="login_password" placeholder="password" class="form-control" required><br>
                <button class="btn btn-primary form-control"name="loginBtn">Login</button>
            </form>
            <?php if($user->loggedUser): ?>
                <div class="alert alert-success">Uspjesno logovanje <a href="index.php">Idi na Blog</a></div>
            <?php elseif(isset($_POST['loginBtn'])): ?>
                <div class="alert alert-danger">Username ili password pogresni</div>
            <?php endif ?>
        </div>


        <div class="col-6">
            <h4>Register</h4>
            <form action="login_register.php" method="POST">
                <input type="text" name="register_name" placeholder="name" class="form-control"  required><br>
                <input type="text" name="register_surname" placeholder="surname" class="form-control"  required><br>
                <input type="email" name="register_email" placeholder="email" class="form-control" required><br>
                <input type="password" name="register_password" placeholder="password" class="form-control" required><br>
                <button class="btn btn-warning form-control"name="registerBtn">Register</button>


            </form>
            <?php if($user->register_result): ?>
                <div class="alert alert-success">Uspjesna registracija.Ulogujte se</div>
                <?php elseif($user->userExist): ?>
                    <div class="alert alert-danger">Korisnik vec postoji u bazi</div>
                <?php endif ?>

        </div>
    </div>
</div>

<!-- <form action="login_register.php" method="POST">
    <button class="btn btn-danger form-control"name="del">Delete All from Users</button>
</form> -->
<?php
 require_once "partials/bottom.php" ?>
