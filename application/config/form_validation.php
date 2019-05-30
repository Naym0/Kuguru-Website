<?php
$config = array(
	'login' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		)
	),
	'register' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|is_unique[users.email]',
			'errors' => array(
				'is_unique' => 'Email is already registered'
			)
		),
		array(
			'field' => 'first_name',
			'label' => 'First name',
			'rules' => 'required'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last name',
			'rules' => 'required'
		),
		array(
			'field' => 'user_type',
			'label' => 'User type',
			'rules' => 'required'
		)
	),
	'reset_password' => array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[8]'
		),
		array(
			'field' => 'password_confirm',
			'label' => 'Confirm password',
			'rules' => 'required|matches[password]',
			'errors' => array(
				'match' => 'Passwords must match'
			)
		)
	),
	'forgot_password' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		)
	),
	'register_admin' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|is_unique[users.email]',
			'errors' => array(
				'is_unique' => 'Email is already registered'
			)
		)
	),
	'register_employee' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|is_unique[users.email]',
			'errors' => array(
				'is_unique' => 'Email is already registered'
			)
		)
	)

);
