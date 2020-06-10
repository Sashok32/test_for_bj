<?php

    spl_autoload_register(function ($class) {
        $class = str_replace('\\', '/', $class);
echo '<pre>';
print_r($class);
var_dump(file_exists($class . '.php'));
die();
        if (file_exists($class . '.php')) {
            include $class . '.php';
        } else {
            exit('ERROR 404');
        }

    });