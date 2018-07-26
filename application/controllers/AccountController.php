<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {
	
	public function showAction() {
		$this->view->render('Аккаунт');
	}	

	public function loginAction() {
		if (!empty($_POST)) {
			if (!$this->model->validate(['login', 'password'], $_POST)) {
				$this->view->message('error', $this->model->error);
			} elseif (!$this->model->checkData($_POST['login'], $_POST['password'])) {
				$this->view->message('error', 'Логин или пароль указаны неверно');
			} elseif (!$this->model->checkStatus('login',$_POST['login'])) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->login($_POST['login']);
			$this->view->location('/account/profile');
		}
		$this->view->render('Аккаунт');
	}

	public function registerAction() {
		if (!empty($_POST)) {
			if (!$this->model->validate(['email', 'login', 'password'], $_POST)) {
				$this->view->message('error', $this->model->error);
			} elseif (!$this->model->checkEmailExist($_POST['email'])) {
				$this->view->message('error', $this->model->error);
			} elseif (!$this->model->checkLoginExist($_POST['login'])) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->register($_POST);
			$this->view->message('Succes', 'Регистрация завершена. Подтвердите свой E-mail');
		}		
		$this->view->render('Регистрация');
	}

	public function confirmAction() {
		if (!$this->model->checkTokenExist($this->route['token'])) {
			// If token does not exist you will redirect to main page
			$this->view->redirect('');
		}		
		$this->model->activate($this->route['token']);
		$this->view->render('Активация завершена');
	}

	public function profileAction() {
		$this->view->render('Профиль');
	}

	public function logoutAction() {
		unset($_SESSION['account']);
		$this->view->redirect('account/show');
	}

	public function recoveryAction() {
		if (!empty($_POST)) {
			if (!$this->model->validate(['email'], $_POST)) {
				$this->view->message('error', $this->model->error);
			}
			elseif ($this->model->checkEmailExist($_POST['email'])) {
				$this->view->message('error', 'Пользователь не найден');
			}
			elseif (!$this->model->checkStatus('email', $_POST['email'])) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->recovery($_POST);
			$this->view->message('success', 'Запрос на восстановление пароля отправлен на E-mail');
		}
		$this->view->render('Восстановление пароля');
}
	
	public function resetAction() {
		if (!$this->model->checkTokenExist($this->route['token'])) {
			$this->view->redirect('account/show');
		}		
		$password = $this->model->reset($this->route['token']);
		$vars = [
			'password' => $password,
		];
		$this->view->render('Пароль сброшен', $vars);
	}
}