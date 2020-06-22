<?php /** @var array $products */?>

<div class="product-box">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <a href="/?c=product&a=card&id=<?=$product->getId()?>"><img class="product__img" src="<?=$product->getImagelink()?>" alt="<?=$product->getName()?>"></a>
            <div class="product__text">
                <a href="/?c=product&a=card&id=<?=$product->getId()?>" class="product__name"><?=$product->getName()?></a>
                <p class="product__price"><?=$product->getPrice()?></p>
            </div>
        </div>
    <?php endforeach;?>
</div>

