<?php

namespace application\models;

use application\core\Model;

class Account extends Model{
	
	public function validate($input, $post) {
		$rules = [
			'email' => [
				'pattern' => '#^([A-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
				'message' => 'E-mail указан неверно',
			],
			'login' => [
				'pattern' => '#^[A-z0-9]{2,15}$#',
				'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 2 до 15 символов)',
			],
			'password' => [
				'pattern' => '#^[A-z0-9]{5,30}$#',
				'message' => 'Пароль указан неверно (от 5 до 30 символов)',
			]
		];
		foreach ($input as $val) {
			if (!isset($post[$val]) or empty($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
				$this->error = $rules[$val]['message'];
				return false;
			}
		}
		return true;
	}

	public function checkEmailExist($email) {
		$params = [
			'email' => $email
		];
		if ($this->db->column('SELECT id FROM users WHERE email = :email', $params)){
			$this->error = 'Этот E-mail уже используется';
			return false;
		}
		return true;
	}

	public function checkLoginExist($login) {
		$params = [
			'login' => $login
		];
		if ($this->db->column('SELECT id FROM users WHERE login = :login', $params)){
			$this->error = 'Этот логин уже используется';
			return false;
		}
		return true;
	}

	public function checkTokenExist($token) {
		$params = [
			'token' => $token
		];
		return $this->db->column('SELECT id FROM users WHERE token = :token', $params);
	}

	public function activate($token) {
		$params = [
			'token' => $token
		];
		$this->db->query('UPDATE users SET status = 1, token = "" WHERE token = :token', $params);
	}

	public function createToken() {
		return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
	}

	public function register($post) {
		$token = $this->createToken();
		$params = [
			'id' => '',
			'email' => $post['email'],
			'login' => $post['login'],
			'password' => password_hash($post['password'], PASSWORD_BCRYPT),
			'token' => $token,
			'status' => 0,
		];
		$this->db->query('INSERT IGNORE INTO users VALUES (:id, :email, :login, :password, :token, :status)', $params);
		// For using at real server you shold create separate file in directory 'application/config/' with administrator's e-mail and other information. Also you need to clarify conditions sending emails from your server with administrator.
		mail($post['email'],'Register', 'Confirm: http://http://seg.local/account/confirm/'.$token);
	}

	public function checkData($login, $password) {
		$params = [
			'login' => $login,
		];
		$hash = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
		if (!$hash or !password_verify($password, $hash)){
			return false;
		}
		return true;
	}

	public function checkStatus($type, $data) {
		$params = [
			$type => $data
		];
		$status = $this->db->column('SELECT status FROM users WHERE '.$type.' = :'.$type.'', $params);
		if ($status != 1) {
			$this->error = 'Аккаунт ожидает подтверждения по E-mail';
			return false;
		}
		return true;
	}

	public function login ($login) {
		$params = [
			'login' => $login
		];
		$data = $this->db->row('SELECT * FROM users WHERE login = :login', $params);
		$_SESSION['account'] = $data[0];
	}

	public function recovery ($post) {
		$token = $this->createToken();
		$params = [
			'token' => $token,
			'email' => $post['email'],
		];
		$this->db->query('UPDATE users SET token = :token WHERE email = :email', $params);
		mail($post['email'],'Recovery', 'Confirm: http://http://seg.local/account/reset/'.$token);
	}

	public function reset($token) {
		$new_password = $this->createToken();
		$params = [
			'token' => $token,
			'password' => password_hash($new_password, PASSWORD_BCRYPT),
		];
		$this->db->query('UPDATE users SET status = 1, token = "", password = :password WHERE token = :token', $params);
		return $new_password;
	}

	public function getContacts() {
		$params = [
			'id' => 2,
		];	
		$result = $this->db->row('SELECT name, age, id FROM users', $params);
		return $result;
	}
}