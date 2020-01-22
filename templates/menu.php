<?if (!$auth) :?>

<form method="post" action="/auth/login/">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    Save? <input type='checkbox' name='save'>
    <input type='submit' name='send'>
</form>

<? else: ?>
Добро пожаловать! <?=$user?> <a href="/?logout">Выход</a><br>
<? endif; ?>

<a href="/">Главная</a>
<a href="/catalog/">Каталог</a>
<!--<a href="/about/">О нас</a>-->
<a href="/gallery/">Галерея</a>
<a href="/feedback/">Отзывы</a>
<a href="/basket/">Корзина <span id="basketCount"><?= getBasketCount(session_id()) ?></span></a>
<? if(isAdmin()): ?>
<a href="/orders/">Заказы</a>
<? endif; ?>