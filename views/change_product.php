<?php /** @var \app\models\records\Product $product */?>

<h2>Данные о товаре:</h2>
<form class="form" enctype="multipart/form-data" action="/admin/change" method="post">
    <input type="hidden" name="id" value="<?=$product->getId()?>">
    <label for="name">Название товара</label>
    <input type="text" id="name" name="name" value="<?=$product->getName()?>">
    <label for="price">Цена товара</label>
    <input type="number" id="price" name="price" value="<?=$product->getPrice()?>">
    <label for="description">Описание товара</label>
    <textarea id="description" name="description" cols="30" rows="10"><?=$product->getDescription()?></textarea>
    <label for="category">Категория товара</label>
    <input type="text" id="category" name="category" value="<?=$product->getCategoryId()?>">
    <input type="hidden" name="old_imagelink" value="<?=$product->getImagelink()?>">
    <img class="main-image" src="<?=$product->getImagelink()?>" alt="<?=$product->getName()?>"><br>
    <label for="imagelink">Загрузить другое изображение:</label>
    <input id="imagelink" type="file" name = 'my_file'>
    <input type="submit" value="Сохранить">
</form>
<br>
<form class="form" action="/admin/delete" method="post">
    <input type="hidden" name="id" value="<?=$product->getId()?>">
    <input type="submit" value="Удалить товар" style="background-color: red">
</form>