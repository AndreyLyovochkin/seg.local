<p>Контакты</p>

<?php foreach ($contacts as $val): ?>
	<p>ID: <b><?=$val['id'] ?></b></p>
	<p>Имя: <b><?php echo $val['name'] ?></b></p>
	<p>Возраст: <b><?=$val['age'] ?></b></p>
	<br>
<?php endforeach; ?>