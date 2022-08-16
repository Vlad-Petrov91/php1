<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../config/config.php";


$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$layout = 'main';
$params = [];

switch ($page) {
    case 'index':
        $params['title'] = "Главная";
        break;
    case 'codewars':
        $params['title'] = "CodeWars";
        break;
    case 'about':
        $params['title'] = "O нас";
        $params['phone'] = 54332;
        break;
    case 'catalog':
        $params['title'] = "Каталог";
        $params['catalog'] = getCatalog();

        break;
    case 'gallery':
        $params['title'] = "Галерея";
//        $layout = 'gallery';
        $params['images'] = getGallery();
        break;

    default:
        echo 404;
        die();
}

echo render($page, $params, $layout);



