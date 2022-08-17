<?php

function getGallery($path){
    $images = scandir($path);
  return array_splice($images, 2);
}

function loadImage()
{
        $uploaddir = "img/gallery/big/";
        $uploadfile = $uploaddir . $_FILES['myFile']['name'];
        $imageinfo = getimagesize($_FILES['myFile']['tmp_name']);

        if (file_exists($uploadfile)) {
            processing("errorName");
        }
        if ($_FILES["myFile"]["size"] > 1024 * 1 * 1024) {
            processing("errorSize");
        }
        if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
            processing("errorType");
        }
//    if ($_FILES['myFile']['type'] != "image/jpeg"){
//        processing("errorType");
//    }
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $_FILES['myFile']['name'])) {
                processing("errorTypePHP ");
            }
        }

        if (move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadfile)) {
            processing("ok");
        } else {
            processing("error");
        }


}
$messages = [
    'ok'=> "Успешно загружен",
    'error'=> 'Ошибка загрузки',
    'errorName' => "Ошибка. Файл существует, выберите другое имя файла!",
    'errorSize' => "Размер файла не больше 5 мб",
    'errorType' => "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.",
    'errorTypePHP' => "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.",

];

function processing($message){
    header("Location: /?page=gallery&status=$message");
    die();
}