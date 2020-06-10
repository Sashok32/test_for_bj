<?php
    use models\User;
    use widgets\Helper;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Exercises</title>
<?php include 'bootstrap.html';?>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="/"><h3>Задачник!</h3></a>
        <?php if (User::isAdmin()): ?>
            <h4><?=User::userName()?></h4>
            <a href="?route=user/logout">
                <button class="btn btn-primary" type="button">
                    Выход
                </button>
            </a>
        <?php else: ?>
            <a href="?route=user/login">
                <button class="btn btn-primary" type="button">
                  Авторизация
                </button>
            </a>
        <?php endif; ?>

    </nav>

   <?= Helper::getFlush();?>

    <?=
        $content;
    ?>

</div>

<?php include 'jQuery.html';?>

<style>
    <?php include 'default.css';?>
</style>

<script>
    <?php include 'default.js';?>
</script>

</body>
</html>