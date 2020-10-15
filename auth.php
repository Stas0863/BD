<?php
include_once "system/header.php";
echo'
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body><div >
<form action="" class="row">
   <label>Логин</label>
   <input name="email" required placeholder="Введите логин">
   <label>Пароль</label>
   <input name="parol" required placeholder="Введите пароль">
   <p><input class="c1" type="submit" value="Войти"></p>
  </form>
Все поля обязательный для заполнения!
</div>
</body>
</html>';
?>