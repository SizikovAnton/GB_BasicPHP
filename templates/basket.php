<h2>Корзина</h2>

<table id="basket">
</table>

<a href="/checkout">Оформить заказ</a>
<script>

async function renderBasket() {
    let basketTable = document.getElementById("basket");
    let response = await fetch('/api/getBasket');
    let answer = await response.json();

    let basketTableHtml = 
    `<tr>
        <td>Изображение</td>
        <td>Название</td>
        <td>Количество</td>
        <td>Цена за 1 шт</td>
        <td>Цена за позицию</td>
        <td>Удалить</td>
    </tr>`;
    answer.forEach(item => {
        basketTableHtml += 
        `<tr>
            <td><img src="/images/catalog/` + item['image'] + `" alt="` + item['name'] + `" width="150"></td>
            <td>` + item['name'] + `</td>
            <td>` + item['count'] + `</td>
            <td>` + item['price'] + `</td>
            <td>` + item['count'] * item['price'] + `</td>
            <td><button onclick="deleteBasket(` + item['basket_id'] + `)">[X]</button></td>
        </tr>`;
    });
    basketTable.innerHTML = basketTableHtml;
}

async function deleteBasket(id) {
    let response = await fetch('/api/deleteBasket/?id=' + id);
    await renderBasket();
}

window.onload = function() {
    renderBasket();
}

</script>