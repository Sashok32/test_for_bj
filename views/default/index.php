
<?php
/* @var $model models\Exercises */
 ?>

<p><a href="?route=task/create"><button type="button" class="btn btn-outline-primary">Создать задачу</button></a></p>

<!--sort by-->
<br><span class="badge badge-primary">Сортировка: </span>
<?php if (!empty($viewSort)){
    echo $viewSort;
}?>

<?php

foreach ($model as $task):?>
    <div class="task <?php if($task['done']) echo 'done'; ?>">
        <span class="badge badge-success"><?=$task['name']?></span>
        <br>
        <b><i><?=$task['email']?></i></b> <?php if($task['done']) {echo '<span class="badge badge-danger">решена</span>';} if($task['updated']) {echo ' <span class="badge badge-danger">отредактировано администратором</span>';} ?>
        <p class="text"><?=htmlspecialchars($task['exercise'])?></p>

        <?php if (\models\User::isAdmin()):?>
            <a href="?route=task/update&id=<?=$task['id']?>"><button type="button" class="editTask btn btn-warning">Редактировать задачу</button></a>
        <?php endif;?>
        <hr>
    </div>
<?php endforeach;?>

<?php if (!empty($viewPages)){
    echo $viewPages;
}?>
