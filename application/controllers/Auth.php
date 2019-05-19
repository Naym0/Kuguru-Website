<?php defined('BASEPATH') or die('No direct script access allowed');

class Auth extends CI_Controller
{
	var $layout = 'template/template';
	function index()
	{
		//? Validation rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'content' => 'auth/login'
			);
			$this->load->view($this->layout, $data);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->login($email, $password);
		}
	}

	function login($email, $password)
	{ }
}
