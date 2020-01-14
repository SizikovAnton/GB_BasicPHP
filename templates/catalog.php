<h2>Каталог товаров:</h2>
<?php foreach ($catalog as $value):?>
<div>
    <a href="/catalogItem/?id=<?= $value["id"] ?>">
        <h2><?=$value["name"]?></h2>
        <div><img src="/images/catalog/<?= $value["image"] ?>" height="200px"></div>
    </a>
    Стоимость: <?=$value["price"]?><br>
    <button>Купить</button><hr>
</div>
<? endforeach;?>