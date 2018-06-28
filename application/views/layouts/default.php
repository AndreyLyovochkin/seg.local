<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="/public/styles/style.css">
	<script src="/public/scripts/jquery.js"></script>
	<script src="/public/scripts/form.js"></script>
</head>
<body>
	<div id="menu">
		<a id=main href="/">Главная</a>
		<a id=news href="/news/show">Новости</a>
		<a id=contacts href="/contacts" >Контакты</a>
		<a id=login href="/account/login">Войти</a>
		<a id=registration href="/account/registration">Регистрация</a>
		<a id=adminer href="/adminer-4.6.2.php">Админка для БД</a>
	</div>


	<?php echo $content; ?>
</body>
</html>