<?php
/** @var $content */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Shop</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="wrapper container">
    <div class="top">
<!--        TODO: Переделать подключение меню через рендер-->
        <?php include VIEWS_DIR . "layouts/menu.php";?>

        <?=$content?>
    </div>
    <footer class="footer">
        <p>Copyright &copy; <?=date('Y')?> Maria Sobol</p>
    </footer>
</div>
</body>
</html>

