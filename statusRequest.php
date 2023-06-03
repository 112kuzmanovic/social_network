<?php require_once "bootstrap.php"; ?>

<?php $id=$_GET['id']; ?>
<?php $loggedId = $_SESSION['loggedUser']->users_id; ?>

<?php $isSend = $profil->viewSendRequest($loggedId,$id)?>
<?php $isFollow = $profil-> viewSendRequest($id,$idLogged)?>

<?php $send = $profil->viewSendRequest1($loggedId,$id); ?>
<?php $send2 = $profil->viewSendRequest1($id,$idLogged); ?>






<?php if($isSend==NULL && $isFollow==NULL && $send==NULL && $send2==NULL): ?>
    <form action="sendRequest.php"method="POST">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <button name="sendRequest" class="btn btn-primary">Send request</button>
    </form>
        <?php elseif($send!=NULL || $send2!=NULL): ?>
            <button class="btn btn-outline-success">You are friends</button>
<?php endif ?>

<?php if($isSend!=NULL): ?>
    <?php foreach($isSend as $is);?>
    <?php if($is->sender_id==$loggedId && $is->recipient_id==$id):?>
        <button class="btn btn-warning">Request is sent</button>
        <?php endif ?>
    <?php elseif($isFollow!=NULL): ?>
        <?php foreach ($isFollow as $isf); ?>
            <form action="acceptRefuse.php"method="POST">
        <input type="hidden" name="friendRequest" value="<?php echo $isf->sender_id ?>">
        <input type="hidden" name="loggedId" value="<?php echo $loggedId ?>">
        <button name="accept"type="submit" class="btn btn-success">Acept</button>
        <button name="ignore"type="submit" class="btn btn-danger">Ignore</button>
    </form>
<?php endif ?>










