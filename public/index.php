<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$page = $_GET['page'] ?? 'index';

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
        if(!empty($_FILES)){
            loadImage();
        }
        if (!empty($_GET['status'])) {
            $params['message'] = $messages[$_GET['status']];
        }

       // $params['message'] = $messages[$_GET['status']];
        $params['title'] = "Галерея";
        $layout = 'gallery';
        $params['images'] = getGallery(IMAGES_DIR);

        break;

    default:
        echo 404;
        die();
}

echo render($page, $params, $layout);



