<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

	public function indexAction() {
		
		$db = new Db;

		// $form = '2: DELETE FROM users';
		// $params = [
		// 	'id' => $form,
		// ];
		// $params = [
		// 	'id' => 2,
		// ];
		// $data = $db->column('SELECT name FROM users WHERE id = :id', $params);		
		// debug($data);

		$this->view->render('Главная страница');

	}

	public function contactsAction() {
		$result = $this->model->getContacts();
		$vars = [
			'contacts' => $result
		];
		$this->view->render('Контакты',$vars);		
	}
}