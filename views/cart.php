<?php /** @var \app\models\Cart $cart */?>

<div class="product-in-cart">
    <div>Название товара</div>
    <div>Цена за ед.</div>
    <div>Количество</div>
    <div>Сумма</div>
</div>
<?php foreach ($cart->getProductsInCart() as $product): ?>
    <div class="product-in-cart">
        <div><?=$product['name']?></div>
        <div><?=$product['price']?> руб.</div>
        <div><?=$product['quantity']?></div>
        <div><?=$product['price'] * $product['quantity']?> руб.</div>
        <form action="" method="post">
            <button type="submit" name="add" value="<?=$product['id']?>">+</button>
            <button type="submit" name="reduce" value="<?=$product['id']?>">-</button>
            <button type="submit" name="delete" value="<?=$product['id']?>">X</button>
        </form>
    </div>
<?php endforeach;?>
<br>
<h2>Итого: <?=$cart->getSum()?> руб.</h2>
<br>
<form action="" method="post">
    <input value="Оформить заказ" type="submit"/>
</form>
