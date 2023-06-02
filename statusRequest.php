<?php require_once "bootstrap.php"; ?>
<?php $_SESSION['loggedUser']->users_id=$idLogged;?>
<?php  $_GET['id']=$id; ?>
<?php $isSend=$profil->viewSendRequest($idLogged,$id)?>
<?php $isSend2 = $profil-> viewSendRequest($id,$idLogged)?>

<?php foreach($isSend as $is); ?>
<?php foreach ($isSend2 as $is) ?>



<?php if($isSend==NULL): ?>
    <form action="sendRequest.php"method="POST">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <button name="sendRequest" class="btn btn-primary">Follow</button>
    </form>
<?php endif ?>
<?php if($isSend!=NULL): ?>
<?php if($is->sender_id==$idLogged && $is->recipient_id==$id): ?>
    <form action="">
        <button class="btn btn-warning">Is sent</button>
    </form>
<?php endif ?>

<?php if($is->sender_id==$id && $is->recipient_id==$idLogged): ?>
    <form action="acceptRefuse.php"method="POST">
        <input type="hidden" name="friendRequest" value="<?php echo $is->sender_id ?>">
        <button name="accept"type="submit" class="btn btn-success">Acept</button>
    </form>
<?php endif ?>
<?php endif ?>

