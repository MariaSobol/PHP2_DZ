<?php /** @var array $products */?>

<div class="product-box">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <a href="/product/card&id=<?=$product->getId()?>"><img class="product__img" src="<?=$product->getImagelink()?>" alt="<?=$product->getName()?>"></a>
            <div class="product__text">
                <a href="/product/card&id=<?=$product->getId()?>" class="product__name"><?=$product->getName()?></a>
                <p class="product__price"><?=$product->getPrice()?></p>
                <form action="/admin/changeform" method="post" style="margin-bottom: 15px">
                    <input type="hidden" name="product_id" value="<?=$product->getId()?>">
                    <input value="Редактировать" type="submit"/>
                </form>
            </div>
        </div>
    <?php endforeach;?>
</div>
<br>
<form action="/admin/addform" method="post">
    <input value="Добавить товар" type="submit"/>
</form>