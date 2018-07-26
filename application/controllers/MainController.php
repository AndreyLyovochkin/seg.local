<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

	public function indexAction() {
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