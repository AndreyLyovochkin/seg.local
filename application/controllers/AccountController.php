<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {
	
	public function loginAction() {
		// $this->view->redirect('http://seg.local/account/register');
		if (!empty($_POST)) {
			$this->view->message('Success', 'Text');
			// $this->view->location('/');
		}
		$this->view->render('Страница входа');
	}

	public function registerAction() {
		$this->view->render('Страница регистрации');
		
	}
}