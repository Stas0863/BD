<?php
include_once "system/header.php";
if(!$_POST){
echo'
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body><div >
<form action="" class="row">
   <label>Введите логин</label>
   <input name="login" required placeholder="Логин">
   <label>Email</label>
   <input name="email" required placeholder="Введите почту">
   <label>Пароль</label>
   <input name="pass_1" required placeholder="Введите пароль">
   <label>Введите еще раз пароль</label>
   <input name="pass_2" required placeholder="Введите пароль">
   <p><input type="submit" value="Регистрация"></p>
  </form>
Все поля обязательный для заполнения!
<p><b>Имя и фамилия (обязательные поля, кириллица), email (обязательный, уникальный, тип - email), пароль (минимум 6 символа, обязательно наличие минимум одного символа верхнего и нижнего регистра, одной цифры, и спецсимвола «!, @, _, -, #», подтверждение пароля)
</p></b>
</div>
</body>
</html>';
}else{
	$login = check($_POST['login']);
	$pass_1 = check($_POST['pass_1']);
	$pass_2 = check($_POST['pass_2']);
	$email = check($_POST['email']);
	$up_pass = sha1(md5(sha1(md5(md5(sha1(sha1(md5($pass_2))))))));
	$check_login_1 = $db -> prepare("SELECT * FROM user WHERE login = :login");
	$check_login_1 -> execute(array(":login" => $login));
	$check_login = $check_login_1 -> rowCount();
		$check_email_1 = $db -> prepare("SELECT * FROM user WHERE email = :email");
	$check_email_1 -> execute(array(":email" => $email));
	$check_email = $check_email_1 -> rowCount();
	if($check_login > 0){
		$error = $error . 'Этот логин уже занят<br/>';
	}
		if($check_email > 0){
		$error = $error . 'Эта Э-почта уже занята<br/>';
	}
	if($pass_1 != $pass_2){
		$error = $error . 'Пароли не совпадают';
	}
if(empty($error)){
	$new_user = $db -> prepare("INSERT INTO user SET login = :login, password = :password, email = :email");
	$new_user -> execute(array(":login" => $login, ":password" => $up_pass, ":email" => $email));
	echo '
	<div class = "center lime">Вы успешно зарегестрировались</div>
	<a class = "btnforall" href = "/">Войти</a>
	';
}else{
	echo $error;
}
}
?>