<h3>Состав заказа:</h3>
<table>
    <tr>
        <td>Изображение</td>
        <td>Название</td>
        <td>Количество</td>
        <td>Цена за 1 шт</td>
        <td>Цена за позицию</td>
    </tr>
<? foreach($basket as $item): ?>
    <tr>
        <td><img src="/images/catalog/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="150"></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['count'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['count'] * $item['price'] ?></td>
    </tr>
<? endforeach; ?>
</table>

<div>
    <p>Имя: <?= $basket[0]['order_name'] ?></p>
    <p>Номер телефона: <?= $basket[0]['order_telephone'] ?></p>
    <p>Адрес доставки: <?= $basket[0]['order_adress'] ?></p>
    <p>Стоимость заказа: <?= $basket[0]['order_price'] ?></p>
    <p>Статус заказа: <span id="status"><?= $basket[0]['order_status'] ?></span>
    <select onchange="changeStatus(<?= $item['order_id'] ?>, this.options[this.selectedIndex].value)">
        <option>Новый заказ</option>
        <option>Заказ подтвержден</option>
        <option>Заказ оплачен</option>
        <option>Заказ отправлен</option>
    </select></p>
</div>

<script>
    async function changeStatus(id, status) {
        const response = await fetch('/orders/setStatus/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id,
                    status: status
                }),
            });
            document.getElementById("status").innerHTML = await getStatus(id);
    }

    async function getStatus(id) {
        const response = await fetch('/orders/getStatus/?id=' + id);
        answer = await response.json();
        return answer.order_status;
    }
</script>