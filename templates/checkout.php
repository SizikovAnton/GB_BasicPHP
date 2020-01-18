<?php
//TODO Перенести в контроллер
    $checkout = false;
    if(count($_POST)) {
        $telephone = $_POST['telephone'];
        $adress = $_POST['adress'];
        $session_id = session_id();
        executeQuery("INSERT INTO orders(`session_id`, telephone, adress) VALUES ('{$session_id}','{$telephone}','{$adress}')");
        session_regenerate_id();
        $checkout = true;
    } else {
        $totalPrice = 0;
        foreach($baskets as $item) {
            $totalPrice += $item['price'] * $item['count'];
        }   
    }
?>

<h2>Оформление заказа</h2>

<? if($checkout): ?>
    Заказ оформлен!
<? else: ?>
    <h3>Состав заказа:</h3>
    <table>
        <tr>
            <td>Изображение</td>
            <td>Название</td>
            <td>Количество</td>
            <td>Цена за 1 шт</td>
            <td>Цена за позицию</td>
        </tr>
    <? foreach($baskets as $item): ?>
        <tr>
            <td><img src="/images/catalog/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="150"></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['count'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['count'] * $item['price'] ?></td>
        </tr>
    <? endforeach; ?>
    </table>

    <h3>Итого: <?= $totalPrice ?></h3>

    <form method="post">
        Информация о доставке<br>
        <label for="telephone">Номер телефона</label><br>
        <input name="telephone" type="text" id="telephone"><br>
        <label for="telephone">Адрес доставки</label><br>
        <input name="adress" type="text" id="adress"><br>
        <input type="submit" value="Оформить">
    </form>
<? endif; ?>