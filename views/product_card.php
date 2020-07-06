<?php /** @var \app\models\records\Product $model */?>

<h1><?=$model->getName()?></h1>
<a href="<?=$model->getImagelink()?>" target="_blank"><img class="main-image" src="<?=$model->getImagelink()?>" alt="<?=$model->getName()?>"></a>
<p>Цена: <?=$model->getPrice()?> руб.</p>

<form action="/cart/add" method="post">
    <input type="hidden" name="product_id" value="<?=$model->getId()?>">
    <input type="number" name="quantity" value="1">
    <input value="Добавить в корзину" type="submit"/>
</form>

<p class="description"><?=$model->getDescription()?></p>
<br>