<?php

namespace application\models;

use application\core\Model;

class Main extends Model{
	public function getContacts() {
		$params = [
			'id' => 2,
		];	
		$result = $this->db->row('SELECT name, age, id FROM users WHERE id = :id', $params);
		return $result;
	}
}