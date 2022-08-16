<?php

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

if (!empty($_FILES)) {

    $uploaddir = "img/gallery/big/";
    $uploadfile = $uploaddir . $_FILES['myFile']['name'];
    $imageinfo = getimagesize($_FILES['myFile']['tmp_name']);

    if (file_exists($uploadfile)) {
        processing("errorName");
    }
    if ($_FILES["myFile"]["size"] > 1024*1*1024){
        processing("errorSize");
    }
    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg'){
        processing("errorType");
    }
//    if ($_FILES['myFile']['type'] != "image/jpeg"){
//        processing("errorType");
//    }

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['myFile']['name'])) {
            processing("errorTypePHP ");
        }
    }

    if(move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadfile)){
        processing("ok");
   } else {
        processing("error");
   }

}

if (!empty($_GET['status'])) {
    $message = $messages[$_GET['status']];
}
?>

<div>
    <?php if (isset($message)) :?>
        <?= $message . "<br>"?>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <input name="myFile" type="file">
        <button type="submit" value="Загрузить">Загрузить</button>
    </form>
    <!--    <div class="gallery">-->
    <!--        --><?php //foreach ($images as $val) : ?>
    <!--            <img style="width:150px ;" src="--><?//= IMAGES_DIR . $val ?><!-- " alt="--><?//= $val ?><!--">-->
    <!--        --><?php //endforeach; ?>
    <!--    </div>-->


    <div class="slider">
        <div class="slider__container">
            <div class="slider__wrapper">
                <div class="slider__items">
                    <?php foreach ($images as $val) : ?>
                        <div class="slider__item">
                            <img style="width:150px ;" src="<?= IMAGES_DIR . $val ?> " alt="<?= $val ?>">
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
        <!--        Кнопки для перехода к предыдущему и следующему слайду-->
        <a href="#" class="slider__control" data-slide="prev"></a>
        <a href="#" class="slider__control" data-slide="next"></a>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new ChiefSlider('.slider');
    });
</script>






