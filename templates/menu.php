<?php
$menu = [
    [
        'name' => 'Главная',
        'url' => '/',
    ],
    [
        'name' => 'Каталог',
        'url' => '/?page=catalog',
    ],
    [
        'name' => 'CodeWars',
        'url' => '/?page=codewars',
    ],
    [
        'name' => 'Галерея',
        'url' => '/?page=gallery',
    ],
    [
        'name' => 'O нас',
        'url' => '/?page=about',
    ],

];
?>
<menu>
    <ul class="list-group">
        <?php foreach ($menu as $key => $item) : ?>
            <?php if ($title === $item['name']) : ?>
                <li class="list-group-item"><a class="list-group-item list-group-item-action active" aria-current="true" href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
            <?php else : ?>
                <li class="list-group-item"><a class="list-group-item list-group-item-action" href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

</menu>