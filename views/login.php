<?php /** @var string $errorMessage */?>

<h1>Пожалуйста, авторизуйтесь!</h1>
<form action="" method="post">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="Войти">
</form>

<h1><?=$errorMessage?></h1>

