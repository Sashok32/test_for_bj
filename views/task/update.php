<?php

use models\User;

/* @var $task models\Exercises */
?>

    <form method="post" action="?route=task/update" class="editTaskForm">
        <input name="id" value="<?=$task['id']?>" hidden>
        <input name="updated" class="updatedTask" value="<?=$task['updated']?>" hidden>
        <fieldset class="form-group">
            <label for="userName">Имя</label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?=$task['name']?>" disabled>
        </fieldset>
        <fieldset class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" name="email" value="<?=$task['email']?>" disabled>
        </fieldset>
        <fieldset class="form-group">
            <label for="exercise">Задача:</label>
            <textarea required minlength="3" name="exercise" id="exercise" class="form-control" cols="70" rows="3"><?=$task['exercise']?></textarea>
        </fieldset>
            Решена?
            <label><input type="radio" name="done" value="1" <?php if($task['done']) echo 'checked'; ?>>Да</label>
            <label><input type="radio" name="done" value="0" <?php if(!$task['done']) echo 'checked'; ?>>Нет</label>
        <?php if($task['updated']):?>
            <span class="badge badge-danger">отредактировано администратором</span>
        <?php endif;?>
        <br><button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
<?php if($noPermission):?>
    <p class="text-danger error-message">У Вас нет прав на редактирование записи. <a href="?route=user/login">Авторизуйтесь</a></p>
<?php endif;?>

<?php if($error):?>
    <p class="text-danger error-message"><?=$error?></p>
<?php endif;?>