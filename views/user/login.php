
<?php
use models\User;
 ?>

<?php if (User::isAdmin()){
    header('Location: /');
}?>

<form method="post">
    <fieldset class="form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </fieldset>
    <fieldset class="form-group">
        <label for="pass">Пароль</label>
        <input type="password" class="form-control" id="pass" name="password" required>
    </fieldset>
    <button type="submit" class="btn btn-primary">Вход</button>
</form>

<?php if($error):?>
    <p class="text-danger"><?=$error?></p>
<?php endif;?>