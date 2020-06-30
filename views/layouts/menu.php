<?php
/** @var array $menu */

//TODO: убрать отсюда (куда?)
$menu = [
    "Главная" => "product",
    "Каталог" => "product",
    "Контакты" => "#",
    "Личный кабинет" => "account",
    "Корзина" => "cart",
];
?>

<ul class="menu">
    <?php foreach ($menu as $name => $link): ?>
        <li class="menu__list">
            <a href="/<?=$link?>"><?=$name?></a>
        </li>
    <?php endforeach;?>
</ul>
