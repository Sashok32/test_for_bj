<?php
    use models\User;
?>
<h3>Новая задача</h3>

    <form method="post" class="createTaskForm">
        <fieldset class="form-group">
            <label for="userName">Имя</label>
            <input type="text" class="form-control" id="userName" name="name" required <?php if(User::isAdmin()):?> value="<?=User::userName()?>" disabled <?php endif;?>>
        </fieldset>
        <fieldset class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" name="email" required <?php if(User::isAdmin()):?> value="<?=User::userEmail()?>" disabled <?php endif;?>>
        </fieldset>
        <fieldset class="form-group">
            <label for="exercise">Задача:</label>
            <textarea required minlength="3" name="exercise" id="exercise" class="form-control" cols="70" rows="3"></textarea>
        </fieldset>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

<?php if($error):?>
    <p class="text-danger error-message"><?=$error?></p>
<?php endif;?>