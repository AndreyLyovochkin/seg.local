<p><b>Новости</b></p>

<?php foreach ($news as $val): ?>
	<h3><?php echo $val['title'] ?></h3>
	<p><?=$val['description'] ?></p>
	<hr>
<?php endforeach; ?>