<?php /** @var \app\models\UserOrders $orders */?>

<div class="orders">
    <div>Номер заказа</div>
    <div>Статус заказа</div>
</div>
<?php foreach ($orders->getOrders() as $order): ?>
    <div class="orders">
        <div><?=$order['id']?></div>
        <div><?=$order['status']?></div>
    </div>
<?php endforeach;?>
