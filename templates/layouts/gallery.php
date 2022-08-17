<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/slider.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
<header>
    <h1><?= $title ?></h1>
</header>

<main class="content">
    <nav> <?= $menu ?></nav>



    <div>
        <?= $message ?>
        <form method="POST" enctype="multipart/form-data">
            <input name="myFile" type="file">
            <button type="submit" value="Загрузить">Загрузить</button>
        </form>

<!--            <div class="gallery">-->
<!--                --><?php //foreach ($images as $val) : ?>
<!--                    <img style="width:150px ;" src="--><?//= IMAGES_DIR . $val ?><!-- " alt="--><?//= $val ?><!--">-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->


        <div class="slider">
            <div class="slider__container">
                <div class="slider__wrapper">
                    <div class="slider__items">
                        <?= $content ?>
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
</main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script defer src="../../js/slider.js"></script>
</body>

</html>