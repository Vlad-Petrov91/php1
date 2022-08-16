<div class="catalogCards card-group">
    <?php foreach ($catalog as $key => $item) : ?>
        <div class="card border-primary text-center" style="margin-bottom: 5px; min-width: 14rem; max-width: 18rem;">
            <img src="../img/catalog/<?= $item['img'] ?>.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $item['name'] ?></h5>
                <p class="card-text"><?= $item['info'] ?></p>
            </div>
            <div class="card-footer  ">
                <h6><?= $item['price'] ?> руб.</h6>
                <button class="btn btn-primary" type="submit">Купить</button>
            </div>
        </div>

    <?php endforeach; ?>
</div>