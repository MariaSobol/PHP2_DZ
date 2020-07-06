<h2>Заполните данные о товаре:</h2>
<form class="form" enctype="multipart/form-data" action="/admin/change" method="post">
    <label for="name">Название товара</label>
    <input type="text" id="name" name="name">
    <label for="price">Цена товара</label>
    <input type="number" id="price" name="price" value="0">
    <label for="description">Описание товара</label>
    <textarea id="description" name="description" cols="30" rows="10"></textarea>
    <label for="category">Категория товара</label>
    <input type="text" id="category" name="category">
    <label for="imagelink">Изображение</label>
    <input id="imagelink" type="file" name = 'my_file'>
    <input type="submit" value="Сохранить">
</form>