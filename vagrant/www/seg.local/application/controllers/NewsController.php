<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller {
	public function showAction() {
		$result = $this->model->getNews();
		$vars = [
			'news' => $result,

		];
		$this->view->render('Новости',$vars);
	}
}