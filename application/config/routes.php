<?php

return [
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'contacts' => [
		'controller' => 'main',
		'action' => 'contacts',
	],

	'news' => [
		'controller' => 'news',
		'action' => 'show',
	],

	'news/add' => [
		'controller' => 'news',
		'action' => 'add',
	],

	'news/edit' => [
		'controller' => 'news',
		'action' => 'edit',
	],	

	'news/delete' => [
		'controller' => 'news',
		'action' => 'delete',
	],

	'account/show' => [
		'controller' => 'account',
		'action' => 'show',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/logout' => [
		'controller' => 'account',
		'action' => 'logout',
	],

	'account/recovery' => [
		'controller' => 'account',
		'action' => 'recovery',
	],

	'account/profile' => [
		'controller' => 'account',
		'action' => 'profile',
	],
	
	'account/delete' => [
		'controller' => 'account',
		'action' => 'delete',
	],
	'account/confirm/{token:\w+}' => [
		'controller' => 'account',
		'action' => 'confirm',
	],
	'account/reset/{token:\w+}' => [
		'controller' => 'account',
		'action' => 'reset',
	],

];