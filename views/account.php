<?php
/**
 * @var string $login
 * @var string $userName
 */
?>

<h2>Логин: <?= $login?></h2>
<p>Добро пожаловать, <?=$userName?></p>
<br>
<form action="" method="post">
    <input name="logout" value="Выход" type="submit"/>
</form>
<form action="/orders" method="post">
    <input name="orders" value="Мои заказы" type="submit"/>
</form>

