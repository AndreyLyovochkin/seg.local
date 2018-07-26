<h1>Вход</h1>
<form action="/account/login" method="post">
	<p>Логин</p>
	<p><input type="text" name="login"></p>
	<p>Пароль</p>
	<p><input type="password" name="password"></p>
	<a><button type="submit" name="enter">Вход</button></a>
	
</form>
<a href="/account/recovery">Забыли пароль</a>
<br>
<h1>Регистрация</h1>
<form action="/account/register" method="post">
	<p>E-mail</p>
	<p><input type="text" name="email"></p>
	<p>Логин</p>
	<p><input type="text" name="login"></p>
	<p>Пароль</p>
	<p><input type="password" name="password"></p>
	<a><button type="submit" name="enter">Регистрация</button></a>
</form>