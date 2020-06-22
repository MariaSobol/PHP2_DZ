<?php
/** @var array $menu */

//TODO: убрать отсюда (куда?)
$menu = [
    "Главная" => "?c=product",
    "Каталог" => "?c=product",
    "Контакты" => "#",
    "Личный кабинет" => "#",
    "Корзина" => "?c=cart",
];
?>

<ul class="menu">
    <?php foreach ($menu as $name => $link): ?>
        <li class="menu__list">
            <a href="/<?=$link?>"><?=$name?></a>
        </li>
    <?php endforeach;?>
</ul>
