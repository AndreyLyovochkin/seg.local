<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="/public/styles/style.css">
	<script src="/public/scripts/jquery.js"></script>
	<script src="/public/scripts/form.js"></script>
</head>
<body>
	<div id="header"></div>
		<div id="menu">
			<a id=main href="/">Главная</a>
			<a id=news href="/news">Новости</a>
			<a id=contacts href="/contacts" >Контакты</a>
			<?php if (isset($_SESSION['account']['id'])): ?>
				<a id=adminer href="/account/profile">Профиль</a>
				<a id=adminer href="/account/logout">Выход</a>
				<a id=adminer href="/adminer-4.6.2.php">Админка для БД</a>
			<?php else: ?>
				<a id=account href="/account/show">Аккаунт</a>
			<?php endif; ?>
		</div>

	<div id="content">
		<?php echo $content; ?>
	</div>
	<div id="footer"></div>
</body>
</html>