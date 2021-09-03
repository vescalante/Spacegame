<?php

# db configuration 

define('DB_NAME', 'cygame_test');
define('DB_USER', 'test_cy_ad');
define('DB_PASSWORD', 'eM93bn#6');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}

$db_selected = mysqli_select_db($link, DB_NAME);

if (!$db_selected) {
    die('Cannot access' . DB_NAME . ': ' . mysqli_error($link));
}

?>
