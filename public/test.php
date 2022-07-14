<?php

// ini_set('open_basedir');

ini_set('display_errors', 'On');

error_reporting(E_ALL);

$path = 'storage';

// Сканируем директорию, без вывода на экран
scandir($path);

var_dump(
    // Проверяем, доступная ли директория для чтения
    is_readable($path),

    // Узнаем значение open_basedir
    ini_get('open_basedir')
);

echo 'Hello';
