<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'view' => 'message/default',

		'classes' => array(
			'success' => 'success',
			'info'    => 'info',
			'error'   => 'error',
			'warning' => 'warning',
		),
	),

	'bootstrap' => array
	(
		'view' => 'message/bootstrap',

		'classes' => array(
			'success' => 'alert-success',
			'info'    => 'alert-info',
			'error'   => 'alert-error',
			'warning' => NULL,
		),
	),

	'bootstrap3' => array
	(
		'view' => 'message/bootstrap',

		'classes' => array(
			'success' => 'alert-success',
			'info'    => 'alert-info',
			'error'   => 'alert-danger',
			'warning' => 'alert-warning',
		),
	),
);
