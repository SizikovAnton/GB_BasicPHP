<h2>Список заказов</h2>
<? foreach($orders as $item): ?>
    <div>
        <p>Имя: <?= $item['name'] ?></p>
        <p>Номер телефона: <?= $item['telephone'] ?></p>
        <p>Адрес доставки: <?= $item['adress'] ?></p>
        <p>Стоимость заказа: <?= $item['sum'] ?></p>
        <p>Статус заказа: <?= $item['status'] ?></p>

        <a href="item/?id=<?= $item['id'] ?>">Подробнее</a>
    </div>
    <hr>
<? endforeach; ?>