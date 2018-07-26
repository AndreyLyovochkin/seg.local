<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class AdminController extends Controller {

	public function loginAction() {
		$this->view->render('Вход');

	}

	public function logoutAction() {
		exit('Выход');
	}

	public function addAction() {
		$this->view->render('Добавить пост');

	}

	public function editAction() {
		$this->view->render('Редактировать пост');

	}

	public function deleteAction() {
		exit('Удаление поста');		
	}
}